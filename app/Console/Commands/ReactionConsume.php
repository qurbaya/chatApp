<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Modules\Modules\Match\Repository\WriteReactionRepository;
use Modules\Services\Amqp\RabbitMQService;

class ReactionConsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reaction-consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(RabbitMQService $service, WriteReactionRepository $repository): void
    {
        $service->consume('reaction',function ($msg) use ($repository) {
            DB::transaction(function () use ($msg, $repository) {
                $data = json_decode($msg->getBody(), true);
                $repository->add(
                    $data['user_id'],
                    $data['receiver_id'],
                    $data['reaction']
                );
                $msg->ack();
            });


        });
    }
}
