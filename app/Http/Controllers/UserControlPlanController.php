<?php

namespace App\Http\Controllers;

use App\Mail\ChargeUserRenovationMail;
use App\Mail\Finance;
use App\Mail\UserControlPlan as MailUserControlPlan;
use App\Services\GetewayPayment;
use Illuminate\Http\Request;
use App\Models\UserControlPlan;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserControlPlanRequest;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;
use function dd;
use function dump;
use function env;
use Carbon\Carbon;
use function floatval;
use function gettype;
use function json_encode;

class UserControlPlanController extends Controller
{
   
    public function alter(Request $request)
    {

        $userControlPlan = new UserControlPlan();
        $userControlPlan->name = $request->name;
        $userControlPlan->email = $request->email;
        $userControlPlan->cpfCnpj = $request->cpfCnpj;
        $userControlPlan->plan_actual = $request->plan_actual;
        $userControlPlan->new_plan = $request->new_plan;

        $exchange = '360_alter_plan';
        $queue = env('RABBITMQ_QUEUE_FINANCE');
        $connection = new AMQPStreamConnection(
            env('RABBITMQ_DEFAULT_HOST'),
            env('RABBITMQ_DEFAULT_PORT'),
            env('RABBITMQ_DEFAULT_USER'),
            env('RABBITMQ_DEFAULT_PASS'),
            '/'
        );

        $channel = $connection->channel();
        // Declarando a Exchange
        $channel->exchange_declare($exchange, AMQPExchangeType::DIRECT, false, true, false);

        $channel->queue_declare($queue, false, true, false, false);
        $channel->queue_bind($queue, $exchange);


        $messageBody = json_encode($userControlPlan);
        $message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $channel->basic_publish($message, $exchange, null);

        $getPay = new GetewayPayment(
            $request->email,
            floatval($request->value_new_plan),
            Carbon::now()->addDays(3),
            "BOLETO"
        );
        $getBilling = $getPay->getUserGeteway();


        Mail::to($request->email)->send(new ChargeUserRenovationMail($getBilling));
        $channel->close();
        $connection->close();
        return response()->json(['message' => 'success'], 200);

    }
}
