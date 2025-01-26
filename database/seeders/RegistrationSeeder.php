<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use App\Models\YourModelName; // Replace with your actual model
use Faker\Factory as Faker;

class RegistrationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        $programs = [
            ['MA', 15],
            ['MTS', 15],
            ['Wustha', 15],
            ['Ulya', 15],
        ];

        foreach ($programs as [$program, $count]) {
            for ($i = 0; $i < $count; $i++) {
                Siswa::create([
                    'nisn' => $faker->unique()->numerify('##########'),
                    'nama' => $faker->name,
                    'program_pendidikan' => $program,
                    'nik' => $faker->numerify('################'),
                    'nomor_kk' => $faker->numerify('################'),
                    'tempat_lahir' => $faker->city,
                    'tanggal_lahir' => $faker->dateTimeBetween('-20 years', '-15 years')->format('Y-m-d'),
                    'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                    'tahun' => '2024',
                    'alamat_domisili' => $faker->address,
                    'provinsi' => $faker->state,
                    'kota' => $faker->city,
                    'kecamatan' => $faker->citySuffix,
                    'kelurahan' => $faker->streetName,
                    'jumlah_saudara' => $faker->numberBetween(1, 5),
                    'anak_ke' => $faker->numberBetween(1, 5),
                    'asal_sekolah' => 'SMP ' . $faker->city,
                    'nama_ayah' => $faker->name('male'),
                    'nik_ayah' => $faker->numerify('################'),
                    'pendidikan_ayah' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
                    'pekerjaan_ayah' => $faker->jobTitle,
                    'nama_ibu' => $faker->name('female'),
                    'nik_ibu' => $faker->numerify('################'),
                    'pendidikan_ibu' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2']),
                    'pekerjaan_ibu' => $faker->jobTitle,
                    'penghasilan' => $faker->numberBetween(1000000, 10000000),
                    'alamat_kk' => $faker->address,
                    'no_hp_orangtua' => $faker->numerify('08##########'),
                    'kopiah' => $faker->randomElement([4,5,6,7,8,9]),
                    'seragam' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                    'nama_pengirim' => $faker->name,
                    'image_bukti_transaksi_url' => $faker->imageUrl(640, 480, 'business', true),
                    'status_pendaftaran' => 'menunggu verifikasi'
                ]);
            }
        }
    }
}