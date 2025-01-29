<?php

namespace App\Console\Commands;

use App\Mail\Finance;
use App\Models\UserControlPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class SendEmailFinance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-finance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue = env('RABBITMQ_QUEUE_FINANCE');

        $connection = new AMQPStreamConnection(
            env('RABBITMQ_DEFAULT_HOST'),
            env('RABBITMQ_DEFAULT_PORT'),
            env('RABBITMQ_DEFAULT_USER'),
            env('RABBITMQ_DEFAULT_PASS'),
            '/'
        );

        $channel = $connection->channel();
        $channel->queue_declare($queue, false, true, false, false);
        $callback = function ($msg) {
            $data = json_decode($msg->body);
            $userControlPlan = new UserControlPlan();
            $userControlPlan->name = $data->name;
            $userControlPlan->email = $data->email;
            $userControlPlan->cpfCnpj = $data->cpfCnpj;
            $userControlPlan->plan_actual = $data->plan_actual;
            $userControlPlan->new_plan = $data->new_plan;
            echo "Nome: " . $userControlPlan->name . "\n";
            Mail::to('franciscoanto@gmail.com')->send(new Finance($userControlPlan));
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_qos(null, 1, null);
        $channel->basic_consume($queue, '', false, false, false, false, $callback);
        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();

        return Command::SUCCESS;
    }
}
