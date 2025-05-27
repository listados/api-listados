<div style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
  <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">

    <!-- Cabeçalho -->
    <div style="text-align: center; padding: 10px; background-color: #007bff; color: #ffffff; border-radius: 8px 8px 0 0;">
      <h2 style="margin: 0;">BOLETO DE PAGAMENTO</h2>
    </div>

    <!-- Conteúdo -->
    <div style="padding: 20px; text-align: left; color: #333333;">
      <p style="text-align: center; margin: 40px 0;">
        <strong>Equipe 360 Listados</strong>, está enviando para você o boleto de pagamento da sua renovação de plano.
      </p>

      <h3 style="text-align: center; color: #007bff; margin-bottom: 30px;">Informações</h3>

      <div style="background: #f8f9fa; padding: 15px; border-left: 4px solid #007bff; border-right: 4px solid #007bff; margin: 0 auto 50px auto; border-radius: 5px; max-width: 500px;">
        <p style="text-align: center; margin: 10px 0;">
          <strong>Link de pagamento:</strong><br>
          <a href="{{ $getBilling['invoiceUrl'] }}" style="color: #007bff; text-decoration: none;" target="_blank">
            {{ $getBilling['invoiceUrl'] }}
          </a>
        </p>
        <p style="text-align: center; margin: 10px 0;"><strong>Valor do pagamento:</strong> {{ $getBilling['value'] }}</p>
        <p style="text-align: center; margin: 10px 0;"><strong>Vencimento:</strong> {{ $getBilling['dueDate'] }}</p>
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
