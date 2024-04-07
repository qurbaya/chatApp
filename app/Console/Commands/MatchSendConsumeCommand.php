<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Modules\Modules\Match\Repository\WriteReactionRepository;
use Modules\Services\Amqp\RabbitMQService;

class MatchSendConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rb:matchconsume';

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
        $service->consume('matchSend', function ($msg) use ($repository) {
            DB::transaction(function () use ($repository, $msg) {
                $data = json_decode($msg->getBody(), true);
                $repository->addMatch(
                    $data['userId'],
                    $data['receiverId']
                );

                $msg->ack();
            });
        });
    }
}
