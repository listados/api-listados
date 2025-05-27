<div style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
  <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">

    <div style="text-align: center; padding: 10px; background-color: #007bff; color: #ffffff; border-radius: 8px 8px 0 0;">
      <h2 style="margin: 0;">Confirmação de Novo Plano</h2>
    </div>

    <div style="padding: 20px; text-align: left; color: #333333;">
      <p style="text-align: center; margin: 40px;">
        Olá, <strong>{{ $userControlPlan->name }}</strong>,
      </p>

      <p style="text-align: center;">
        Você solicitou um pedido de mudança de plano. Atualmente o seu plano é
        <strong>{{ $userControlPlan->plan_actual }}</strong> e solicitou a mudança para
        <strong>{{ $userControlPlan->new_plan }}</strong>.
      </p>

      <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #007bff; border-right: 4px solid #007bff; margin: 50px auto; border-radius: 5px; text-align: center;">
        <p><strong>Seu novo plano:</strong> {{ $userControlPlan->new_plan }}</p>
        <p><strong>Pagamento:</strong> Você receberá o boleto por e-mail em breve.</p>
        <p>Enquanto isso, você já pode usufruir dos recursos do novo plano.</p>
      </div>

      <p style="text-align: center; margin: 40px;">Caso tenha alguma dúvida, estamos à disposição!</p>

      <div style="text-align: center;">
        <a href="https://api.whatsapp.com/send?phone=5585998660078" target="_blank" style="max-width: 150px; display: block; margin: 40px auto; text-align: center; padding: 10px 2px; background-color: #007bff; color: #ffffff; border-radius: 5px; text-decoration: none;">
          Fale Conosco
        </a>
      </div>

      <div style="text-align: center; font-size: 12px; color: #666666; margin-top: 20px; padding: 10px; background: #f1f1f1; border-radius: 0 0 8px 8px;">
        <p>Atenciosamente,<br><strong>Equipe Listados</strong></p>
        <p>📞 (85) 99866-0078 | ✉ contato@listados.com.br</p>

        <div style="margin-top: 10px;">
          <a href="https://api.whatsapp.com/send?phone=5585998660078" target="_blank" style="text-decoration: none; color: #007bff;">
            Whatsapp
          </a>
        </div>
      </div>
    </div>
  </div>
</div>