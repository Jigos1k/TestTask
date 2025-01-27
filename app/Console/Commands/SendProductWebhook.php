<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Modals\Product;

class SendProductWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-product-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the latest product to the configured webhook URL';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $latestProduct = Product::orderBy('id', 'desc')->first();

        if($latestProduct){
            $webhook = config('product.webhook');

            http::post($webhook, [
                'id' => $latestProduct->id,
                'name' => $latestProduct->name,
                'article' => $latestProduct->article,
                'status' => $latestProduct->status,
                'data' => $latestProduct->data,
            ]);
        }
    }
}
