INSERT INTO pengguna (nama_pengguna, email, kata_sandi, peran) VALUES
('admin', 'admin@gmail.com', MD5('admin123'), 'admin'),
('penulis', 'penulis1@gmail.com', MD5('penulis123'), 'penulis'),
('pembaca', 'pembaca1@gmail.com', MD5('pembaca123'), 'pembaca'),
('aji', 'aji@gmail.com', MD5('aji123'), 'penulis');


INSERT INTO tbberita (judul, isiberita, gambar, id_pengguna) VALUES
('Berita Pertama', 'Ini adalah berita pertama.', 'gambar1.jpg', 2),
('Berita Kedua', 'Ini adalah berita kedua.', 'gambar2.jpg', 2);


INSERT INTO komentar (id_berita, id_pengguna, isi_komentar) VALUES
(1, 3, 'Komentar untuk berita pertama.'),
(2, 3, 'Komentar untuk berita kedua.');

email:admin@gmail.com
pw:admin
email:penulis1@gmail.com
pw:penulis
email:penulis2@gmail.com
pw:penulis
email:pembaca1@gmail.com
pw:pembaca
email:pembaca2@gmail.com
pw:pembaca

email:aji@gmail.com
pw:aji123