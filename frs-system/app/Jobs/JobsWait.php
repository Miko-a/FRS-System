<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pengambilan;
use App\Models\User;
use App\Models\Kelas;
use App\Notifications\KelasPenuhNotification;
use Illuminate\Support\Facades\DB;

class JobsWait implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nrp;
    protected $kelas_id;

    /**
     * Create a new job instance.
     */
    public function __construct($nrp, $kelas_id)
    {
        $this->nrp = $nrp;
        $this->kelas_id = $kelas_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            // Lock baris kelas untuk mencegah race condition
            $kelas = Kelas::where('kelas_id', $this->kelas_id)->lockForUpdate()->first();

            if ($kelas->pengambilan()->count() < $kelas->kapasitas) {
                Pengambilan::firstOrCreate([
                    'nrp' => $this->nrp,
                    'kelas_id' => $this->kelas_id,
                ]);
            }

            
        });
    }
}
