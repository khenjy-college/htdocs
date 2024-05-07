package com.example.app_005.models

import com.google.firebase.database.IgnoreExtraProperties

@IgnoreExtraProperties
data class User(
    val userId: String? = null,
    val username: String? = null,
    val phone: String? = null) {

}
