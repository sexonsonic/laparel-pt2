<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;


class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.dosen
     *
     * @return void
     */
    public function run()
    {
        // Menghapus Semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        // Membuat data Dosen
        $dosen = Dosen::create([
            'nama' => 'Abdul Musthafa',
            'nipd' => '1234567890'
        ]);
        $this->command->info('Data Dosen berhasil dibuat');

        // Membuat data Mahasiswa
        $mamat = Mahasiswa::create([
            'nama' => 'Mamat Kabrit',
            'nim' => '1010101',
            'id_dosen' => $dosen->id
        ]);

        $dadang = Mahasiswa::create([
            'nama' => 'Dadang Peloy',
            'nim' => '1010102',
            'id_dosen' => $dosen->id
        ]);

        $feri = Mahasiswa::create([
            'nama' => 'Feri Ambyar',
            'nim' => '1010103',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa berhasil dibuat');

        // Membuat data Wali
        $ahmad = Wali::create([
            'nama' => 'Ahmad',
            'id_mahasiswa' => $mamat->id
        ]);

        $dudung = Wali::create([
            'nama' => 'Dudung',
            'id_mahasiswa' => $dadang->id
        ]);

        $basit = Wali::create([
            'nama' => 'Basit',
            'id_mahasiswa' => $feri->id
        ]);
        $this->command->info('Data Wali berhasil dibuat');

        // Membuat data Hobi
        $mancing = Hobi::create([
            'hobi' => 'Mancing Keributan'
        ]);

        $gaming = Hobi::create([
            'hobi' => 'Game Mobile'
        ]);

        $mengaji = Hobi::create([
            'hobi' => 'Mengaji Al Quran'
        ]);

        // Melampirkan Hobi ke Mahasiswa

        $mamat->hobi()->attach($mancing->id);
        $mamat->hobi()->attach($mengaji->id);
        $dadang->hobi()->attach($gaming->id);
        $feri->hobi()->attach($mengaji->id);
        $this->command->info('Data Hobi Mahasiswa berhasil dibuat');
    }
}

