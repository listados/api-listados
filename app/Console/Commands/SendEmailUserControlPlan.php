<?php

namespace App\Console\Commands;

use App\Mail\UserControlPlan as MailUserControlPlan;
use App\Models\UserControlPlan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use function env;
use function json_decode;

class SendEmailUserControlPlan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-user-control-plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consumidor da mensageria para usuario trocar o plano';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue = 'user_360';

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
            echo "Nome User Controller: " . $userControlPlan->name . "\n";
            Mail::to($data->email)->send(new MailUserControlPlan($userControlPlan));
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
