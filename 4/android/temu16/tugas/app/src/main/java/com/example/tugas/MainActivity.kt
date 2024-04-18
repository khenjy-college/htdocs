package com.example.tugas

import android.os.Bundle
import android.util.Log
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener


class MainActivity : AppCompatActivity() {
    private var mDatabase: DatabaseReference? = null
    private var userDataTextView: TextView? = null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        userDataTextView = findViewById<TextView>(R.id.userDataTextView)

        // Initialize Firebase Database
        mDatabase = FirebaseDatabase.getInstance().getReference().child("users")

        // Read data from Firebase Database
        mDatabase!!.addValueEventListener(object : ValueEventListener {
            override fun onDataChange(dataSnapshot: DataSnapshot) {
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                val userData = StringBuilder()
                for (snapshot in dataSnapshot.children) {
                    val username = snapshot.child("username").getValue(String::class.java)
                    val email = snapshot.child("email").getValue(String::class.java)
                    val age = snapshot.child("age").getValue(Int::class.java)!!
                    userData.append("Username: ").append(username).append("\n")
                    userData.append("Email: ").append(email).append("\n")
                    userData.append("Age: ").append(age).append("\n\n")
                }
                userDataTextView?.text = userData.toString()
            }


            override fun onCancelled(error: DatabaseError) {
                // Failed to read value
                Log.w(TAG, "Failed to read value.", error.toException())
            }
        })
    }

    companion object {
        private const val TAG = "MainActivity"
    }
}

