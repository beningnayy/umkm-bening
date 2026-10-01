<?php
// ============================================
// DATA PRODUK - Bloomé Bucket
// Nanti kalau sudah pakai database, file ini
// bisa diganti dengan query ke MySQL.
// ============================================

$kategori_list = [
    'bunga'   => 'Buket Bunga',
    'uang'    => 'Buket Uang',
    'snack'   => 'Buket Snack',
    'cokelat' => 'Buket Cokelat',
    'boneka'  => 'Buket Boneka', 
    'buah'  => 'Buket Buah', 
];

$produk_list = [
    // bunga
    [
        'id'         => 'Blush Romance',
        'nama'       => 'Blush Romance',
        'harga'      => 175000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 2.jpg',
        'deskripsi'  => 'Buket bunga dengan perpaduan warna pink lembut yang memberikan kesan manis, romantis, dan elegan. Rangkaian bunga disusun dengan tambahan bunga-bunga kecil sebagai pelengkap sehingga terlihat lebih penuh dan cantik. Cocok diberikan sebagai hadiah untuk orang tersayang, sahabat, maupun untuk merayakan momen spesial seperti ulang tahun, anniversary, wisuda, atau sekadar memberikan kejutan.',
    ],
    [
        'id'         => 'Colorful Joy',
        'nama'       => 'Colorful Joy',
        'harga'      => 150000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 6.jpg',
        'deskripsi'  => 'Buket dengan kombinasi berbagai bunga dan warna cerah yang memberikan kesan ceria dan penuh energi. Perpaduan warna pink, kuning, oranye, biru, dan putih membuat buket ini terlihat unik serta menarik perhatian. Cocok untuk kamu yang ingin memberikan hadiah dengan suasana menyenangkan dan berbeda, baik untuk ulang tahun, wisuda, maupun sebagai bentuk apresiasi kepada seseorang.',
    ],
    [
        'id'         => 'Sunny Bloom',
        'nama'       => 'Sunny Bloom',
        'harga'      => 150000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 4.jpg',
        'deskripsi'  => 'Buket bernuansa hangat dengan bunga matahari sebagai fokus utama, dipadukan dengan dedaunan hijau dan bunga-bunga kecil sebagai pelengkap. Warna kuning cerahnya memberikan kesan ceria, hangat, dan penuh semangat. Buket ini cocok diberikan kepada sahabat, keluarga, maupun orang tersayang untuk menyampaikan ucapan selamat, terima kasih, atau sekadar memberikan kejutan kecil yang berkesan.',
    ],
    [
        'id'         => 'Red Romance',
        'nama'       => 'Red Romance',
        'harga'      => 200000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 3.jpg',
        'deskripsi'  => 'Buket mawar merah dengan tampilan elegan dan penuh kesan romantis. Mawar merah yang dirangkai bersama bunga-bunga kecil dan dedaunan hijau menciptakan tampilan yang mewah namun tetap klasik. Cocok untuk menyampaikan rasa sayang, merayakan anniversary, Valentine, ulang tahun pasangan, atau momen spesial lainnya. Pilihan yang tepat untuk memberikan kesan istimewa dan berkesan kepada orang yang kamu sayangi.',
    ],
    [
        'id'         => 'Garden Mix',
        'nama'       => 'Garden Mix',
        'harga'      => 165000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 5.jpg',
        'deskripsi'  => 'Buket dengan perpaduan berbagai jenis bunga dan warna yang memberikan nuansa seperti taman bunga yang segar dan natural. Kombinasi warna yang beragam membuat tampilannya terlihat cerah, unik, dan penuh kehidupan. Dilengkapi dengan wrapping bernuansa natural yang membuat buket semakin cantik. Cocok untuk hadiah ulang tahun, wisuda, ucapan selamat, maupun sebagai kejutan untuk orang terdekat.',
    ],
    [
        'id'         => 'Pink Tulip',
        'nama'       => 'Pink Tulip',
        'harga'      => 155000,
        'kategori'   => 'bunga',
        'gambar'     => 'image/bouquet/bunga 7.jpg',
        'deskripsi'  => 'Buket tulip dengan dominasi warna pink dan putih yang memberikan kesan lembut, manis, dan elegan. Tulip disusun bersama bunga-bunga kecil berwarna putih serta daun hijau untuk menciptakan tampilan yang sederhana namun tetap menarik. Cocok diberikan sebagai hadiah ulang tahun, wisuda, anniversary, atau untuk menunjukkan perhatian kepada seseorang. Desainnya yang soft juga membuat buket ini cocok untuk berbagai usia dan momen.',
    ],

    // contoh produk kategori lain, silakan ditambah sendiri
    // money
    [
        'id'         => 'Mint Money',
        'nama'       => 'Mint Money',
        'harga'      => 175000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 6.jpg',
        'deskripsi'  => 'Buket uang dengan tampilan elegan dan lembut menggunakan perpaduan warna mint, putih, dan cokelat. Rangkaian uang dibuat penuh dan dipadukan dengan bunga putih serta pita besar yang memberikan kesan rapi dan mewah. Cocok untuk hadiah wisuda, ulang tahun, pencapaian, maupun kejutan untuk orang tersayang.',
    ],
    [
        'id'         => 'Money Flower',
        'nama'       => 'Money Flower',
        'harga'      => 150000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 4.jpg',
        'deskripsi'  => 'Buket uang dengan desain unik yang memadukan lembaran uang berbentuk bunga dengan dekorasi bernuansa pastel. Kombinasi warna pink, hijau, dan putih membuat buket terlihat manis dan ceria. Cocok untuk berbagai momen spesial seperti ulang tahun, wisuda, maupun sebagai hadiah untuk sahabat dan keluarga.',
    ],
    [
        'id'         => 'Pink Fortune',
        'nama'       => 'Pink Fortune',
        'harga'      => 200000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 1.jpg',
        'deskripsi'  => 'Buket uang dengan dominasi warna pink yang memberikan kesan manis, ceria, dan elegan. Susunan uang dibuat menyerupai rangkaian bunga dan dihiasi dengan wrapping serta pita bernuansa pink. Cocok untuk berbagai momen spesial seperti ulang tahun, wisuda, anniversary, atau sebagai kejutan untuk orang tersayang.',
    ],
    [
        'id'         => 'Money Teddy',
        'nama'       => 'Money Teddy',
        'harga'      => 200000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 5.jpg',
        'deskripsi'  => 'Buket uang dengan perpaduan warna biru dan hitam yang elegan, dilengkapi bunga-bunga kecil dan boneka teddy bear di bagian tengah. Kombinasi tersebut memberikan kesan unik sekaligus menggemaskan. Cocok untuk hadiah ulang tahun, wisuda, kelulusan, atau kejutan untuk seseorang yang spesial.',
    ],
    [
        'id'         => 'Blue Fortune',
        'nama'       => 'Blue Fortune',
        'harga'      => 225000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 3.jpg',
        'deskripsi'  => 'Buket uang dengan desain elegan bernuansa biru dan putih yang memberikan kesan premium. Dilengkapi bunga mawar putih, bunga kecil, kartu ucapan, serta pita hitam yang membuat tampilannya semakin menarik. Cocok untuk hadiah wisuda, ulang tahun, pencapaian, atau momen spesial lainnya.',
    ],
    [
        'id'         => 'Golden Cash',
        'nama'       => 'Golden Cash',
        'harga'      => 150000,
        'kategori'   => 'uang',
        'gambar'     => 'image/bouquet/uang 2.jpg',
        'deskripsi'  => 'Buket uang dengan susunan pecahan rapi dibungkus wrapping elegan, cocok untuk hadiah pernikahan atau wisuda.',
    ],
    // snack
    [
        'id'         => 'Blue Sapphire Snack Series',
        'nama'       => 'SBlue Sapphire Snack Series',
        'harga'      => 75000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 4.jpg',
        'deskripsi'  => 'Rayakan momen spesial orang tersayang dengan Blue Sapphire Snack Series! Buket ini dirancang khusus dengan tema warna aesthetic blue & black yang memberikan kesan modern, maskulin, sekaligus elegan. Perpaduan sempurna antara berbagai camilan favorit bernuansa biru seperti Oishi Pillows, Hello Panda, Gery, Pocky, hingga Ultra Milk yang menyegarkan. Dibalut dengan  wrapper kain/kertas berkualitas tinggi warna hitam dan biru navy, lengkap dengan hiasan bunga kering serta pita satin biru yang manis. Buket snack ini sangat cocok dijadikan hadiah ulang tahun, wisuda, seminar proposal, hari jadi (anniversary), maupun apresiasi untuk teman, pacar, atau sahabat cowok maupun cewek.',
    ],
    [
        'id'         => 'Choco Crunch Classic Bouquet',
        'nama'       => 'Choco Crunch Classic Bouquet',
        'harga'      => 50000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 5.jpg',
        'deskripsi'  => 'Buat hari mereka semakin manis dengan Choco Crunch Classic Bouquet! Hadir dengan tema warna dark chocolate yang elegan dan simpel, buket ini merupakan pilihan tepat bagi para pecinta rasa cokelat sejati. Dirangkai secara rapi berisi porsi camilan lezat seperti Nextar Brownies dan Wafer Tango Royal Chocolate yang kaya rasa. Ukurannya yang pas dan praktis dipegang membuat buket ini sangat cocok untuk hadiah wisuda, ucapan selamat, hadiah ulang tahun simpel, atau kejutan manis tanpa berlebihan. Penampilan warnanya yang netral dan berkelas memberikan kesan eksklusif meski dengan harga yang sangat terjangkau.',
    ],
    [
        'id'         => 'Matcha Lovers Delight Bouquet',
        'nama'       => 'Matcha Lovers Delight Bouquet',
        'harga'      => 85000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 3.jpg',
        'deskripsi'  => 'Khusus untuk para penggemar olahan teh hijau, Matcha Lovers Delight Bouquet hadir sebagai pilihan kado yang unik, mewah, dan berkesan! Mengusung tema warna sage green yang sedang tren, buket berukuran besar ini diisi penuh dengan aneka camilan rasa Matcha pilihan. Di dalamnya terdapat kombinasi lezat dari Dilan Matcha, Mountea, Cimory Fresh Milk Matcha, SilverQueen Green Tea, hingga Pocky Matcha. Dibalut dengan kertas buket warna hijau pastel yang lembut, dihiasi kupu-kupu emas serta aksen bunga yang mempercantik tampilan. Cocok sekali untuk hadiah sidang, graduation kekinian, ulang tahun, atau kado spesial bagi penikmat matcha!',
    ],
    [
        'id'         => 'Blue Pastel Pocky Bloom',
        'nama'       => 'Blue Pastel Pocky Bloom',
        'harga'      => 65000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 1.jpg',
        'deskripsi'  => 'Tampilkan kesan yang ceria dan penuh perhatian dengan Blue Pastel Pocky Bloom! Buket ini memadukan kelezatan Pocky Cookies & Cream dengan keindahan bunga matahari artificial serta dedaunan hijau yang memberikan nuansa segar dan bahagia. Menggunakan balutan kertas transparan dan warna pastel baby blue serta pink soft, buket ini terlihat sangat aesthetic, elegan, dan fotogenik saat diabadikan di momen-momen penting. Sangat direkomendasikan untuk kado wisuda, kelulusan sekolah, ulang tahun sahabat, atau hadiah Valentine.',
    ],
    [
        'id'         => 'Black Velvet Snack Tower Bouquet',
        'nama'       => 'Black Velvet Snack Tower Bouquet',
        'harga'      => 92000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 6.jpg',
        'deskripsi'  => 'Tampil megah dan berkelas, Black Velvet Snack Tower Bouquet adalah pilihan kado spesial yang siap memberikan kesan mendalam! Dirangkai dengan konsep tinggi bernuansa hitam, merah, dan emas yang mewah. Buket ini memuat ragam snack favorit yang melimpah seperti Twistko, Cheetos, Chitato, Pocky Red, Beng-Beng, Top, SilverQueen, hingga Ultra Milk. Sangat cocok diberikan kepada teman, rekan kerja, pacar, atau orang tersayang di hari ulang tahun, kelulusan, maupun perayaan pencapaian penting lainnya.',
    ],
    [
        'id'         => 'Pretty In Pink Strawberry Jumbo Bouquet',
        'nama'       => 'Pretty In Pink Strawberry Jumbo Bouquet',
        'harga'      => 100000,
        'kategori'   => 'snack',
        'gambar'     => 'image/bouquet/snack 2.jpg',
        'deskripsi'  => 'Bikin momen spesial jadi super manis dan romantis dengan Pretty in Pink Strawberry Jumbo Bouquet! Buket snack berukuran ekstra besar ini mengusung tema serba merah muda yang sangat menggemaskan dan memanjakan mata. Diisi dengan jajaran snack manis rasa stroberi dan susu favorit seperti Oishi Sponge Strawberry, Wafer Tango Strawberry, Pocky Pink Mini, hingga Permen ChoCho Lollipop. Rangkaian buket ini mengembang indah dengan lipatan wrapping paper merah muda yang anggun dan pita silver/pink yang menawan. Pilihan terbaik untuk kado ulang tahun pacar, anniversary, hadiah wisuda cewek, maupun hari Valentine.',
    ],
    // buah
    [
        'id'         => 'Romantic Crystal Fruit Bouquet',
        'nama'       => 'Romantic Crystal Fruit Bouquet',
        'harga'      => 160000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 1.jpg',
        'deskripsi'  => 'Berikan kejutan yang tak terlupakan dengan Romantic Crystal Fruit Bouquet! Buket buah eksklusif ini memadukan kesegaran buah anggur manis pilihan yang dikemas secara higienis di dalam bola mika transparan bergaya modern, bersanding indah dengan mawar segar berwarna soft pink dan dedaunan eucalyptus. Bola-bola mika transparan tidak hanya melindungi buah agar tetap bersih dan segar, tetapi juga bisa ditambahi custom tulisan stiker romantis/pesan khusus. Dibalut dengan wrapper hitam yang elegan dan diikat pita nuansa hijau-putih yang manis, buket ini sangat cocok untuk kado anniversary, lamaran, ulang tahun pasangan, hingga hadiah apresiasi bernilai tinggi.',
    ],
    [
        'id'         => 'Ruby Blossom Fruit Arrangement',
        'nama'       => 'Ruby Blossom Fruit Arrangement',
        'harga'      => 145000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 2.jpg',
        'deskripsi'  => 'Hadirkan nuansa hangat dan penuh energi dengan Ruby Blossom Fruit Arrangement! Buket ini memadukan kesegaran buah apel merah manis dan jeruk mandarin pilihan yang kaya vitamin, dirangkai cantik bersama sentuhan bunga mawar artificial berwarna merah menyala dan aksen bunga pom-pom. Setiap buah dibungkus dengan rapi dan aman demi menjaga kebersihan dan kesegarannya. Dengan paduan kertas pembungkus hitam pekat yang kontras serta pita merah yang elegan, buket buah ini merupakan pilihan kado yang sehat sekaligus berkelas untuk perayaan ulang tahun, kado kesembuhan, ucapan selamat, maupun momen Imlek/perayaan keluarga.',
    ],
    [
        'id'         => 'Royal Harvest Fruit Bouquet',
        'nama'       => 'Royal Harvest Fruit Bouquet',
        'harga'      => 200000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 3.jpg',
        'deskripsi'  => 'Tampil mewah dan berlimpah, Royal Harvest Fruit Bouquet menghadirkan kombinasi sempurna antara nutrisi dan estetika kelas atas. Buket ini berisi jajaran buah apel merah ranum dan pir emas (Golden Pear/Century Pear) segar berukuran besar yang ditata secara simetris dan menawan. Dihiasi dengan bunga-bunga mawar pastel dan dedaunan hijau yang memberikan kesan alami dan segar. Dibalut secara profesional menggunakan kombinasi wrapping paper warna krem hangat dan maroon, serta diikat pita emas yang mewah. Buket ini sangat tepat dijadikan kado untuk orang tua, dosen, atasan kantor, kado wisuda, maupun hantaran acara penting.',
    ],
    [
        'id'         => 'Fresh Citrus Sushine Bouquet',
        'nama'       => 'Fresh Citrus Sushine Bouquet',
        'harga'      => 130000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 4.jpg',
        'deskripsi'  => 'Tebarkan keceriaan di hari spesial dengan Fresh Citrus Sunshne Bouquet! Buket buah bernuansa cerah ini berisi deretan buah jeruk mandarin manis yang segar, dirangkai indah bersama taburan bunga camomile putih kecil dan dedaunan hijau yang memberikan kesan alami ala pedesaan Eropa. Buah-buah jeruk diikat anggun dengan tali krem manis, dibungkus menggunakan kertas kraft/nude paper berwarna natural yang memberikan nuansa hangat.',
    ],
    [
        'id'         => 'Berry & Apple Gift Combo Series',
        'nama'       => 'Berry & Apple Gift Combo Series',
        'harga'      => 145000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 6.jpg',
        'deskripsi'  => 'Solusi praktis dan berkesan untuk memberikan kado sekaligus kejutan manis melalui Berry & Apple Gift Combo Series! Buket ini dirancang khusus untuk menggabungkan bingkisan kado spesial (seperti dompet, jam tangan, atau kotak perhiasan) di bagian tengah, dikelilingi oleh kesegaran buah-buahan premium. Dirangkai anggun dengan buah Apel Merah, Apel Hijau Segar, Pir, serta taburan buah Stroberi merah ranum yang ditata di atas rimbunnya dedaunan hijau. Dibalut kertas pembungkus hitam yang memberikan kesan eksklusif, terstruktur, dan manly. Sangat cocok digunakan untuk kado ulang tahun pasangan, kado Hari Ayah, hadiah kelulusan, maupun kado anniversary.',
    ],
    [
        'id'         => 'All-Star Mixed Fresh Fruit Studio Bouquet',
        'nama'       => 'All-Star Mixed Fresh Fruit Studio Bouquet',
        'harga'      => 200000,
        'kategori'   => 'buah',
        'gambar'     => 'image/bouquet/buah 5.jpg',
        'deskripsi'  => 'All-Star Mixed Fresh Fruit Studio Bouquet adalah mahakarya buket buah premium yang menggabungkan berbagai jenis buah segar pilihan terbaik dalam satu rangkaian megah! Berisi kombinasi melimpah seperti Apel Fuji, Pir Singo/Koream, Anggur Hijau, Jeruk, hingga Buah Manggis manis yang dikemas dengan sangat rapi dan higienis. Buket ini dilengkapi dengan bunga mawar segar berwarna krem/peach, bunga lisianthus, dan dedaunan eucalyptus yang mengeluarkan aroma segar alami. Dibalut wrapping paper berwarna soft sage/cream bergaya ala korean florist. Sangat ideal untuk kado pernikahan, hadiah untuk pejabat/atasan, kado ulang tahun besar, atau hantaran syukuran.',
    ],
    // boneka
    [
        'id'         => 'Classic Teddy & Purple Blossom Bouquet',
        'nama'       => 'Classic Teddy & Purple Blossom Bouquet',
        'harga'      => 100000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 1.jpg',
        'deskripsi'  => 'Hadirkan rasa hangat dan kebahagiaan dengan Classic Teddy & Purple Blossom Bouquet! Buket ini menampilkan boneka beruang cokelat dengan bahan bulu lembut nan menggemaskan yang memakai dasi kupu-kupu bermotif. Boneka beruang ini dikelilingi oleh kombinasi indah bunga artificial nuansa warna ungu lavender, mawar lembut, serta hiasan daun dan bunga kecil bernuansa rustic. Dibalut menggunakan wrapping paper pastel perpaduan warna pink dan biru muda, lengkap dengan ikatan pita yang manis. Buket ini sangat cocok untuk kado ulang tahun sahabat, hadiah wisuda, perayaan Hari Valentine, maupun kado ucapan selamat.',
    ],
    [
        'id'         => 'Cute Pink Loopy Squad Grand Bouquet',
        'nama'       => 'Cute Pink Loopy Squad Grand Bouquet',
        'harga'      => 180000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 2.jpg',
        'deskripsi'  => 'Untuk para pecinta karakter menggemaskan Zanmang Loopy, Cute Pink Loopy Squad Grand Bouquet adalah kado impian yang wajib diberikan! Buket berukuran besar ini menghadirkan trio boneka karakter Loopy bernuansa serba pink dengan kupluk/hoodie kelinci yang sangat imut, ditambah satu mini plushy di bagian tengah. Dirangkai sangat mewah dengan tatanan bunga mawar artificial berwarna pink-putih dan pita organza kain tipis yang memberikan volume mengembang. Dibalut wrapping paper putih dan pink dengan aksen kain mesh/netting yang elegan. Buket jumbo ini sangat pas untuk kejutan ulang tahun pacar, kado wisuda kekinian, atau kado perayaan spesial agar foto momen berharga terlihat super instagrammable.',
    ],
    [
        'id'         => 'Miffy Pastel Crochet Bloom',
        'nama'       => 'Miffy Pastel Crochet Bloom',
        'harga'      => 120000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 3.jpg',
        'deskripsi'  => 'Ungkapkan kasih sayang dengan kado penuh kehangatan melalui Miffy Pastel Crochet Bloom! Buket unik ini mengusung seni rajut bernilai estetika tinggi, menampilkan boneka kelinci rajut bergaya Miffy berwarna putih bersih yang sangat imut dan halus. Uniknya, bunga-bunga pendukung seperti Bunga Lily pink dan Bunga Gerbera juga terbuat dari rajutan tangan berkualitas tinggi yang tidak akan pernah layu dan bisa disimpan selamanya sebagai kenang-kenangan. Dibalut wrapping paper warna soft peach yang lembut dengan pita holographic/glitter yang menawan. Sangat cocok untuk kado anniversary, ulang tahun, maupun kado wisuda bernuansa aesthetic.',
    ],
    [
        'id'         => 'Soft Pearl Rabbit Blossom',
        'nama'       => 'Soft Pearl Rabbit Blossom',
        'harga'      => 140000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 4.jpg',
        'deskripsi'  => 'Sentuhan manis, lembut, dan elegan tersaji sempurna dalam Soft Pearl Rabbit Blossom! Menampilkan boneka kelinci berwarna putih gading bernuansa plushy yang sangat lembut dipegang, dikelilingi mahkota bunga Lily pink serta bunga mawar artificial bernuansa pastel yang anggun. Keunikan buket ini terletak pada detail hiasan mutiara yang melingkari bagian bawah bunga, memberikan kesan mewah dan feminin. Pembungkus kertas wrapping berwarna putih bersih dan soft pink menjadikan buket ini sangat cocok diberikan sebagai hadiah pernikahan, wisuda, kado ulang tahun cewek, maupun kejutan romantis.',
    ],
    [
        'id'         => 'Romantic Pink Bear Florist Series',
        'nama'       => 'Romantic Pink Bear Florist Series',
        'harga'      => 120000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 5.jpg',
        'deskripsi'  => 'Kombinasi klasik yang romantis dan tak pernah gagal, Romantic Pink Bear Florist Series! Buket ini memadukan cantiknya boneka beruang warna pink yang manis dengan keindahan bunga mawar merah serta bunga pikok/chrysanthemum ungu dan babys breath yang segar. Dirangkai anggun dengan dengan kertas pembungkus berwarna soft pink yang mengembang manis. Perpaduan antara bunga segar alami yang harum dengan boneka imut yang bisa di simpan menjadikan buket ini pilihan paling pas untuk ungkapan cinta di hari valentine, anniversary, kelulusan, atau kado ulang tahun pasangan.',
    ],
    [
        'id'         => 'Rustic Purple Teddy Bear Gift',
        'nama'       => 'Rustic Purple Teddy Bear Gift',
        'harga'      => 110000,
        'kategori'   => 'boneka',
        'gambar'     => 'image/bouquet/boneka 6.jpg',
        'deskripsi'  => 'Tampil beda dan kekinian dengan Vintage Newspaper Teddy & Lilac Bouquet! Buket ini mengusung tema aesthetic vintage yang unik dengan menyelipkan aksen lembaran kertas koran bergaya ala kafe Eropa di bagian belakang boneka beruang cokelat yang menggemaskan. Dilengkapi dengan tatanan bunga artificial berwarna lilac, mawar peach/krem, serta dedaunan eucalyptus yang segar dipandang. Dibalut wrapping paper putih bersih yang kontras dengan pita satin warna lilac, buket ini terlihat sangat elegan dan cocok untuk kado seminar proposal (sempro), sidang skripsi, wisuda, atau ulang tahun sahabat tercinta.',
    ],
    // coklat
    [
        'id'         => 'SilverQueen Soft Pink Bloom Bouquet',
        'nama'       => 'SilverQueen Soft Pink Bloom Bouquet',
        'harga'      => 150000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 1.jpg',
        'deskripsi'  => 'Hadirkan rasa manis nan romantis dengan SilverQueen Soft Pink Bloom Bouquet! Buket cantik ini memadukan kelezatan 6 batang cokelat SilverQueen bernuansa warna pastel soft pink yang mengembang dengan sangat anggun. Dilengkapi dengan aksen bunga mawar dan bungaan kecil artificial berwarna merah serta putih di bagian tengah, buket ini terbungkus rapi menggunakan wrapping paper warna soft pink berkualitas tinggi dengan pinggiran lis emas. Dilengkapi dengan ikatan pita satin pink yang mempercantik tampilan. Kado ini sangat cocok untuk perayaan wisuda, ulang tahun pacar, hadiah ucapan selamat, hingga momen Valentine.',
    ],
    [
        'id'         => 'SilverQueen Crispy Gold Fan Bouquet',
        'nama'       => 'SilverQueen Crispy Gold Fan Bouquet',
        'harga'      => 80000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 2.jpg',
        'deskripsi'  => 'Manjakan orang tersayang dengan SilverQueen Crispy Gold Fan Bouquet! Buket bertema emas dan pink pastel ini tampil sangat mewah dengan tatanan 7 batang cokelat SilverQueen (kombinasi varian Chunky/Crispy/Cashew) yang disusun menyerupai kipas mekar yang elegan. Buket ini dipercantik dengan sentuhan bunga mawar artificial warna soft pink serta dedaunan hias. Dibungkus rapat dengan wrapping paper premium berkombinasi lis emas tebal yang memberikan kesan exclusive dan high-class. Pilihan kado manis nan mewah untuk memberikan kejutan di hari ulang tahun, sidang skripsi, anniversary, atau perayaan spesial lainnya.',
    ],
    [
        'id'         => 'SilverQueen Chunky Bar Mega Bouquet',
        'nama'       => 'SilverQueen Chunky Bar Mega Bouquet',
        'harga'      => 150000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 3.jpg',
        'deskripsi'  => 'Bagi para pencinta cokelat sejati, SilverQueen Chunky Bar Mega Bouquet adalah kado yang tak tertandingi! Buket jumbo ini berisikan deretan 10+ batang cokelat SilverQueen Chunky Bar yang disusun bertingkat dan padat, memberikan tampilan yang melimpah dan menggiurkan. Dibalut dengan kertas pembungkus (wrapping paper) warna soft peach/nude yang lembut dipadukan dengan aksen kain tulle/tissue paper putih di bagian depan. Diikat dengan pita satin peachy yang besar dan dilengkapi hangtag ucapan. Buket ini sangat ideal untuk memberikan kesan mendalam saat ulang tahun, perayaan anniversary, kado Valentine, atau hadiah kelulusan.',
    ],
    [
        'id'         => 'Premium Chocolate Mix & Babys Breath Warm Dust',
        'nama'       => 'Premium Chocolate Mix & Babys Breath Warm Dust',
        'harga'      => 125000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 4.jpg',
        'deskripsi'  => 'Ungkapkan rasa kasih sayang secara berkelas melalui Premium Chocolate Mix & Babys Breath Warm Dust! Buket ini menawarkan kombinasi variatif cokelat favorit dunia, mulai dari KitKat, Cadbury Dairy Milk, Snickers, Mars, hingga Ferrero Rocher yang disusun harmonis. Dikelilingi taburan bunga dried babys breath berwarna pink-purple. Dibalut wrapping paper nuansa dusty mauve/pink yang aesthetic. Buket romantis ini sangat cocok dijadikan kado anniversary, ulang tahun pacar, maupun momen lamaran/kejutan manis.',
    ],
    [
        'id'         => 'Cadbury & Snickers Royal Chocolate Tower',
        'nama'       => 'Cadbury & Snickers Royal Chocolate Tower',
        'harga'      => 155000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 5.jpg',
        'deskripsi'  => 'Hadiahkan kemewahan cokelat kelas atas dengan Cadbury & Snickers Royal Chocolate Tower! Buket bertema chocolaty brown ini memadukan dominasi cokelat Cadbury Dairy Milk (termasuk varian Silk), Snickers, serta 5Star yang disusun tinggi nan megah. Tema warna ungu dan emas dari kemasan cokelat berpadu sempurna dengan wrapping paper cokelat tua dan bronze gold yang elegan. Dilengkapi pita satin cokelat bermotif ganda. Buket ini sangat cocok untuk diberikan kepada pria maupun wanita di hari wisuda, ulang tahun, perayaan kelulusan, atau kado bisnis yang berkesan.',
    ],
    [
        'id'         => 'SilverQueen Bold Red & Black Rose Bouquet',
        'nama'       => 'SilverQueen Bold Red & Black Rose Bouquet ',
        'harga'      => 70000,
        'kategori'   => 'cokelat',
        'gambar'     => 'image/bouquet/coklat 6.jpg',
        'deskripsi'  => 'Tampil beda, berani, dan penuh pesona dengan SilverQueen Bold Red & Black Rose Bouquet! Buket ini mengusung tema kontras yang elegan dengan perpaduan warna hitam pekat dan merah menyala. Berisikan 4 batang cokelat SilverQueen yang dipadukan secara simetris dengan hamparan bunga mawar artificial merah mekar dan mawar putih murni di bagian tengahnya. Pembungkus kertas berbentuk kelopak warna hitam-merah memberikan kesan gothic, misterius, sekaligus sangat romantis. Sangat cocok sebagai kado Valentine untuk pasangan, kado wisuda cowok/cewek, atau hadiah ulang tahun bernuansa unik.',
    ],
];

// ---------- fungsi bantu ----------

// ambil semua produk berdasarkan kategori
function getProdukByKategori($kategori) {
    global $produk_list;
    return array_filter($produk_list, function ($p) use ($kategori) {
        return $p['kategori'] === $kategori;
    });
}

// ambil 1 produk berdasarkan id
function getProdukById($id) {
    global $produk_list;
    foreach ($produk_list as $p) {
        if ($p['id'] === $id) {
            return $p;
        }
    }
    return null;
}

// format harga jadi "Rp 125.000"
function formatHarga($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
