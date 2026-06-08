<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // Certifique-se de que seu modelo é User (padrão do Laravel)
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // 1. Exibe a tela de pedir o link
    public function showLinkRequestForm()
    {
        return view('auth.esqueceu_senha');
    }

    // 2. Processa o pedido e envia o e-mail
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(
            ['email' => 'required|email|exists:users,email'],
            ['email.exists' => 'Este e-mail não está cadastrado no sistema.']
        );

        $token = Str::random(64);

        // Salva o token na tabela padrão do Laravel (password_reset_tokens)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        // Gera o link que vai para o e-mail do usuário
        $link = route('password.reset', ['token' => $token]) . '?email=' . urlencode($request->email);

        // Envia o e-mail usando a estrutura do Laravel
        Mail::send([], [], function ($message) use ($request, $link) {
            $message->to($request->email)
                    ->subject('Redefinição de Senha - SafePet')
                    ->html("<h3>Recuperação de Senha - SafePet</h3>
                            <p>Você solicitou a redefinição de senha para sua conta.</p>
                            <p>Clique no link abaixo para criar uma nova senha:</p>
                            <a href='{$link}'>Redefinir Minha Senha</a>
                            <br><br>
                            <p>Este link é válido por 1 hora. Se não foi você quem pediu, ignore este e-mail.</p>");
        });

        return back()->with('status', 'Enviamos o link de redefinição para o seu e-mail!');
    }

    // 3. Exibe a tela de criar a nova senha (vinda do link do e-mail)
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // 4. Salva a nova senha de fato
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'password.confirmed' => 'As senhas não coincidem.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.'
        ]);

        // Busca o token do e-mail correspondente
        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        // Valida se o token existe e bate com o hash salvo
        if (!$record || !Hash::check($request->token, $record->token)) {
            return back()->withErrors(['email' => 'Este link de redefinição é inválido ou expirou.']);
        }

        // Verifica se o token expirou (mais de 60 minutos)
        if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'O link de redefinição expirou. Solicite um novo.']);
        }

        // Tudo certo! Atualiza a senha do usuário
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Apaga o token para ele não ser usado de novo
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Sua senha foi alterada com sucesso! Faça o login.');
    }
}