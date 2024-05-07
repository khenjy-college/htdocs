package com.example.app_005.models

import com.google.firebase.database.IgnoreExtraProperties

@IgnoreExtraProperties
data class mahasiswa(
    val name: String? = null,
    val phone: String? = null,
    val imageUrl: String? = null// URL gambar profil pengguna
)
