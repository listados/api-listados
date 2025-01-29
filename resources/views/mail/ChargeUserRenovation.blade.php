<div>
    <h1>BOLETO DE PAGAMENTO</h1>
    <p>
        <strong>Equipe 360 Listados</strong> ,
        está enviando para vocẽ o boleto de pagamento da sua renovação de plano.
    </p>
    <p>
        <h3>Informações</h3>
    </p>
    <p>
        <ul>
            <li>
                Link de pagamento:
                <a href="{{$getBilling['invoiceUrl']}}">{{$getBilling['invoiceUrl']}}</a>
            </li>
            <li>Valor do pagamento: {{$getBilling['value']}}</li>
            <li>Vencimento: : {{$getBilling['dueDate']}}</li>
        </ul>
    </p>

</div>
