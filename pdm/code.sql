
Mahasiswa {
	nrp char(11) pk unique
	nama varchar(100)
	email varchar(255) > login.email
	angkatan int
	program_studi varchar(100)
	semester int
	ipk double
	max_sks int
	sks_yg_diambil int
}

Dosen {
	nip char(10) pk unique
	nama varchar(100)
	program_studi varchar(100)
	email varchar(100) > login.email
}

Mata_kuliah {
	kode_mk char(8) pk
	nama_mk varchar(100)
	sks int
	semester int
	jenis varchar(100)
}

Kelas {
	id_kelas int pk increments
	kode_dosen integer *> Dosen.nip
	hari varchar(7)
	jam_mulai time
	jam_selesai time
	ruangan varchar(10)
	kapasitas int
	kode_mk char *> Mata_kuliah.kode_mk
}

Pengambilan {
	id_pengambilan int pk increments
	nrp char(11) *> Mahasiswa.nrp
	id_kelas int pk increments > Kelas.id_kelas
	tanggal_ambil datetime
}

login {
	login_id int pk increments
	email varchar(255) unique
	password varchar(255)
	role enum
}

Admin {
	id integer pk increments unique
	nama varchar(100)
	email varchar(255) > login.email
	password varchar
}
