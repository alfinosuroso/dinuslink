# dinuslink
DINUS LINK adalah website untuk menemukan partner lomba sesama mahasiswa UDINUS
- git clone https://github.com/alfinosuroso/dinuslink.git
- masuk project dinuslink
- composer install
- nyalakan xampp (aktifkan mysql)
- buat database dinus_link (sesuaikan nama database)
- copy .env ke project (atau buat sendiri)
- php spark migrate
- php spark db:seed CommunitySeeder
- php spark db:seed EventSeeder
- php spark db:seed NewsSeeder
- php spark db:seed NewsDetailSeeder
- php spark db:seed UserSeeder
- php spark db:seed VerificationSeeder
