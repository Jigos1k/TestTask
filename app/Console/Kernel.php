<?php
    namespace App\Console;

    use Illuminate\Console\Scheduling\Schedule;
    use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

    class Kernel extends ConsoleKernel
    {
        protected $commands = [];

        protected function schedule(Schedule $schedule)
        {
            $schedule->command('products:send-webhook')->everyMinute();
        }

        protected function commands()
        {
            // Здесь вы можете загружать команды в приложении
            $this->load(__DIR__.'/Commands');

            require base_path('routes/console.php');
        }
    }
?>