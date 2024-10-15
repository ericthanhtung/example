<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class   DownloadPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $skipCount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($skipCount)
    {
        $this->skipCount = $skipCount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $data = [
            "diaChi" => "",
            "trangThai" => 6,
            "ngayCapTu" => "2015-04-30T17:00:00.000Z",
            "ngayCapToi" => "2024-09-15T16:54:15.971Z",
            "tinhId" => null,
            "huyenId" => null,
            "xaId" => null,
            "loaiHinhSanXuat" => null,
            "tenCoSo" => null,
            "TinhId" => "",
            "skipCount" => $this->skipCount,
            "maxResultCount" => 10,
            "sorting" => null
        ];
        ;
        try {
            $response = Http::withOptions(['verify' => false])
                ->post('https://nghidinh15.vfa.gov.vn/api/services/app/xuLyHoSoTraCuu07Muoi/getListHoSoTraCuu', $data);

            if ($response->successful()) {
                $results = $response->json();
                if ($results['result']) {
                    $items = $results['result']['items'];
                    foreach ($items as $key => $item) {
//                        $giayTiepNhan = $item['giayTiepNhan'];
//                        if (strpos($giayTiepNhan, '_signed_signed_signed.pdf') !== false) {
//                            $link = str_replace('_signed_signed_signed.pdf', '_signed_tonghop.pdf', $giayTiepNhan);
//                        } elseif (strpos($giayTiepNhan, '_signed_signed.pdf') !== false) {
//                            $link = str_replace('_signed_signed.pdf', '_signed_tonghop.pdf', $giayTiepNhan);
//                        }
//                        if (!empty($giayTiepNhan)) {
//                            $url = 'https://nghidinh15.vfa.gov.vn/File/GoToViewTaiLieu?url=' . $giayTiepNhan;
                            $url = 'https://nghidinh15.vfa.gov.vn/File/GoToViewTaiLieu?url=' . $item['duongDanTepCA'];
                            $parts = explode('/', $item['soGiayTiepNhan']);

                            $name = 'GMP/'.$parts[1] . '.' . $parts[0] . '.' . $item['tenCoSo'];
                            $this->downloadPdf($url, $name);
//                        }
                    }
                }
            } else {
                // Log error if needed
            }
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }

    }

    protected function downloadPdf($url, $name)
    {
        $response = Http::withOptions(['verify' => false])
            ->get($url);

        if ($response->successful()) {
            Storage::disk('public')->put($name, $response->body());
        } else {
            logger()->error('Failed to download PDF: ' . $url);
        }
    }
}
