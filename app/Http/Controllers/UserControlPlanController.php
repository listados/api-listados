<?php

namespace App\Http\Controllers;

use App\Mail\Finance;
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
use function env;
use function json_encode;

class UserControlPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserControlPlan $userControlPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserControlPlan $userControlPlan)
    {
        //
    }

    public function alter(Request $request)
    {
       $userControlPlan = new UserControlPlan();
       $userControlPlan->name = $request->name;
       $userControlPlan->email = $request->email;
       $userControlPlan->cpfCnpj = $request->cpfCnpj;
       $userControlPlan->plan_actual = $request->plan_actual;
       $userControlPlan->new_plan = $request->new_plan;

        $getPay = new GetewayPayment($request->email);
        $getPay->getEmail();



//        $exchange = '360_alter_plan';
//        $queue = env('RABBITMQ_QUEUE_FINANCE');
//        $connection = new AMQPStreamConnection(
//            env('RABBITMQ_DEFAULT_HOST'),
//            env('RABBITMQ_DEFAULT_PORT'),
//            env('RABBITMQ_DEFAULT_USER'),
//            env('RABBITMQ_DEFAULT_PASS'),
//            '/'
//        );
//
//        $channel = $connection->channel();
//        // Declarando a Exchange
//        $channel->exchange_declare($exchange, AMQPExchangeType::DIRECT, false, true, false);
//
//        $channel->queue_declare($queue, false, true, false, false);
////        $channel->queue_bind($queue, $exchange);
//
//
//        $messageBody = json_encode($userControlPlan);
//        $message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
//        $channel->basic_publish($message, $exchange, null);
//
//        $channel->close();
//        $connection->close();

    }
}
