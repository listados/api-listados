<div style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
  <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">

    <!-- Cabeçalho -->
    <div style="text-align: center; padding: 10px; background-color: #007bff; color: #ffffff; border-radius: 8px 8px 0 0;">
      <h2 style="margin: 0;">Solicitação de Novo Plano</h2>
    </div>

    <!-- Conteúdo -->
    <div style="padding: 20px; text-align: left; color: #333333;">
      <p style="text-align: center; margin: 40px;">
        O <strong>{{ $userControlPlan->name }}</strong> solicita a troca de seu plano.
      </p>

      <p style="text-align: center;">Segue abaixo os dados do usuário:</p>

      <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #007bff; border-right: 4px solid #007bff; margin: 50px auto; border-radius: 5px;">
        <p style="text-align: center;"><strong>Nome:</strong> {{ $userControlPlan->name }}</p>
        <p style="text-align: center;"><strong>E-mail:</strong> {{ $userControlPlan->email }}</p>
        <p style="text-align: center;"><strong>CNPJ:</strong> {{ $userControlPlan->cpfCnpj }}</p>
        <p style="text-align: center;"><strong>Plano atual:</strong> {{ $userControlPlan->plan_actual }}</p>
        <p style="text-align: center;"><strong>Novo Plano:</strong> {{ $userControlPlan->new_plan }}</p>
      </div>

      <!-- Rodapé -->
      <div style="text-align: center; font-size: 12px; color: #666666; margin-top: 20px; padding: 10px; background: #f1f1f1; border-radius: 0 0 8px 8px;">
        <p>Atenciosamente,<br><strong>Equipe Listados</strong></p>
        <p>📞 (85) 99866-0078 | ✉ contato@listados.com.br</p>

        <!-- Ícones Sociais -->
        <div style="margin-top: 10px;">
          <a href="https://api.whatsapp.com/send?phone=5585998660078" target="_blank" style="text-decoration: none; color: #007bff;">
            Whatsapp
          </a>
        </div>
      </div>
    </div>
  </div>
</div>