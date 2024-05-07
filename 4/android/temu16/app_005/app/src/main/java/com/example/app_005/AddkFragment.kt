package com.example.app_005

import android.app.AlertDialog
import android.app.AlertDialog.Builder
import android.content.Intent
import android.graphics.Color
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.EditText
import android.widget.LinearLayout
import android.widget.TableLayout
import android.widget.TableRow
import android.widget.TextView
import android.widget.Toast
import androidx.navigation.fragment.findNavController
import com.example.app_005.databinding.FragmentAddkBinding
import com.example.app_005.models.User
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.ValueEventListener
import com.google.firebase.database.ktx.database
import com.google.firebase.ktx.Firebase

class AddkFragment : Fragment() {

    private var _binding: FragmentAddkBinding? = null
    private val binding get() = _binding!!

    private lateinit var database: DatabaseReference

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentAddkBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        database = Firebase.database.reference

        readData()

        binding.SendBtn.setOnClickListener {
            saveData()
        }
    }

    private fun saveData() {
        val name = binding.editName.text.toString()
        val phone = binding.editPhoneNumber.text.toString()

        if (name.isEmpty()) {
            binding.editName.error = "Write a name"
            return
        }

        if (phone.isEmpty()) {
            binding.editPhoneNumber.error = "Write a phone number"
            return
        }



        // Generate a unique key for the user
        val userId = database.child("teachers").push().key

        val user = User(userId, name, phone)

        // Check if userId is not null before proceeding
        userId?.let {
            database.child("teachers").child(it).setValue(user)
                .addOnSuccessListener {
                    // Data saved successfully
                    // You can add any success handling here
                    Toast.makeText(context, "Data stored successfully", Toast.LENGTH_SHORT).show()
                    binding.editName.setText("")
                    binding.editPhoneNumber.setText("")
                    binding.tableLayout.removeAllViews()
                    // Re-read data to refresh the TableLayout
                    readData()

                }
                .addOnFailureListener { e ->
                    // Error occurred while saving data
                    // You can add any failure handling here
                    Toast.makeText(context, "Error: ${e.message}", Toast.LENGTH_SHORT).show()
                }

        }
    }

    private fun readData() {
        database.child("teachers").get().addOnSuccessListener { dataSnapshot ->
            val users = mutableListOf<String>()

            for (data in dataSnapshot.children) {
                val user = data.getValue(User::class.java)
                user?.let {
                    val username = it.username
                    val phone = it.phone
                    val idUser = it.userId

                    val newRow = TableRow(requireContext())

                    val textViewName = TextView(requireContext()).apply {
                        layoutParams = TableRow.LayoutParams(
                            ViewGroup.LayoutParams.WRAP_CONTENT,
                            ViewGroup.LayoutParams.WRAP_CONTENT
                        ).apply {
                            setMargins(0, 16, 16, 16)
                        }
                        textSize = 16f
                        var textColor = Color.BLACK
                        text = "${username}"
                    }

                    val textViewPhone = TextView(requireContext()).apply {
                        layoutParams = TableRow.LayoutParams(
                            ViewGroup.LayoutParams.WRAP_CONTENT,
                            ViewGroup.LayoutParams.WRAP_CONTENT
                        ).apply {
                            setMargins(0, 16, 16, 16)
                        }
                        textSize = 16f
                        var textColor = Color.BLACK
                        text = "${phone}"
                    }



                    val editButton = Button(requireContext()).apply {
                        layoutParams = TableRow.LayoutParams(
                            ViewGroup.LayoutParams.WRAP_CONTENT,
                            ViewGroup.LayoutParams.WRAP_CONTENT
                        ).apply {
                            setMargins(0, 16, 16, 16)
                        }
                        text = "Edit"
                        setOnClickListener {
                            // Buat dialog
                            val dialogBuilder = AlertDialog.Builder(context).apply {
                                setTitle("Edit data ${username}")
                            }

                            // Buat EditText untuk memasukkan data baru
                            val editUsername = EditText(context).apply {
                                hint = "Enter new username"
                                setText("${username}")
                            }
                            val editPhone = EditText(context).apply {
                                hint = "Enter new phone number"
                                setText("${phone}")
                            }

                            // Tambahkan EditText ke dalam layout
                            val layout = LinearLayout(context).apply {
                                orientation = LinearLayout.VERTICAL
                                setPadding(40, 20, 40, 20) // Atur padding agar terlihat lebih baik
                                addView(editUsername)
                                addView(editPhone)
                            }

                            dialogBuilder.setView(layout)

                            // Set button "Submit"
                            dialogBuilder.setPositiveButton("Submit") { dialogInterface, which ->
                                // Ambil nilai yang dimasukkan pengguna
                                val newUsername = editUsername.text.toString().trim()
                                val newPhone = editPhone.text.toString().trim()

                                // Lakukan validasi data
                                if (newUsername.isNotEmpty() && newPhone.isNotEmpty()) {
                                    // Lakukan pembaruan data langsung ke database di sini
                                    editUser("${idUser}", newUsername, newPhone)
                                    dialogInterface.dismiss()
                                } else {
                                    Toast.makeText(context, "Please fill in all fields", Toast.LENGTH_SHORT).show()
                                }
                            }

                            // Set button "Cancel"
                            dialogBuilder.setNegativeButton("Cancel") { dialogInterface, which ->
                                dialogInterface.dismiss()
                            }

                            val dialog = dialogBuilder.create()
                            dialog.show()
                        }
                    }

                    val deleteBtn = Button(requireContext()).apply {
                        layoutParams = TableRow.LayoutParams(
                            ViewGroup.LayoutParams.WRAP_CONTENT,
                            ViewGroup.LayoutParams.WRAP_CONTENT
                        ).apply {
                            setMargins(0, 16, 16, 16)
                        }
                        text = "delete"
                        setOnClickListener {
                            var dialogBuilder = AlertDialog.Builder(context).apply {
                                setTitle("hapus data ${username}")
                            }

                            val textView = TextView(context).apply {
                                text = "yakin ingin hapus data ${username}"
                            }

                            dialogBuilder.setPositiveButton("hapus") { dialog, which ->
                                val id = "${idUser}"
                                hapusData(id)
                                dialog.dismiss() // Dismiss the dialog upon clicking "Delete"
                            }
                            dialogBuilder.setNegativeButton("Cancel") { dialog, which ->
                                dialog.dismiss() // Dismiss the dialog upon clicking "Cancel"
                            }

                            val layout = LinearLayout(context).apply {
                                orientation = LinearLayout.VERTICAL
                                setPadding(40, 20, 40, 20) // Atur padding agar terlihat lebih baik
                                addView(textView)
                            }
                            dialogBuilder.setView(layout)

                            val dialog = dialogBuilder.create()
                            dialog.show()

                        }
                    }

                    newRow.addView(textViewName)
                    newRow.addView(textViewPhone)

                    newRow.addView(editButton)
                    newRow.addView(deleteBtn)

                    binding.tableLayout.addView(newRow)

                    binding.tableLayout.invalidate()

                    users.add("${username} - ${phone}")
                }
            }

        }.addOnFailureListener { e ->
            Toast.makeText(context, "Error: ${e.message}", Toast.LENGTH_SHORT).show()
        }
    }

    private fun editUser(userId: String, newUsername: String, newPhone: String) {
        // Query untuk mendapatkan referensi ke user yang akan diedit
        val query = database.child("users").orderByChild("userId").equalTo(userId)

        // Dapatkan data user yang sesuai dengan query
        query.addListenerForSingleValueEvent(object : ValueEventListener {
            override fun onDataChange(dataSnapshot: DataSnapshot) {
                // Iterasi melalui setiap data user yang ditemukan
                for (snapshot in dataSnapshot.children) {
                    // Ambil key dari data user yang ditemukan
                    val userId = snapshot.key

                    // Perbarui data user dengan data baru
                    userId?.let {
                        val updatedUser = User(userId, newUsername, newPhone)
                        database.child("users").child(it).setValue(updatedUser)
                            .addOnSuccessListener {
                                // Data berhasil diperbarui
                                Toast.makeText(context, "Data updated successfully", Toast.LENGTH_SHORT).show()

                                binding.tableLayout.removeAllViews()
                                // Re-read data to refresh the TableLayout
                                readData()

                            }
                            .addOnFailureListener { e ->
                                // Terjadi kesalahan saat memperbarui data
                                Toast.makeText(context, "Error updating data: ${e.message}", Toast.LENGTH_SHORT).show()
                            }
                    }
                }
            }

            override fun onCancelled(databaseError: DatabaseError) {
                // Terjadi kesalahan saat mengambil data
                Toast.makeText(context, "Error fetching data: ${databaseError.message}", Toast.LENGTH_SHORT).show()
            }
        })
    }

    private fun hapusData(userId: String) {
        // Query untuk mendapatkan referensi ke user yang akan dihapus berdasarkan ID
        val query = database.child("users").orderByChild("userId").equalTo(userId)

        // Dapatkan data user yang sesuai dengan query
        query.addListenerForSingleValueEvent(object : ValueEventListener {
            override fun onDataChange(dataSnapshot: DataSnapshot) {
                // Iterasi melalui setiap data user yang ditemukan
                for (snapshot in dataSnapshot.children) {
                    // Hapus data user dari Firebase Database
                    snapshot.ref.removeValue()
                        .addOnSuccessListener {
                            // Data berhasil dihapus
                            Toast.makeText(context, "Data deleted successfully", Toast.LENGTH_SHORT).show()



                            binding.tableLayout.removeAllViews()
                            // Re-read data to refresh the TableLayout
                            readData()
                        }
                        .addOnFailureListener { e ->
                            // Terjadi kesalahan saat menghapus data
                            Toast.makeText(context, "Error deleting data: ${e.message}", Toast.LENGTH_SHORT).show()
                        }
                }
            }

            override fun onCancelled(databaseError: DatabaseError) {
                // Terjadi kesalahan saat mengambil data
                Toast.makeText(context, "Error fetching data: ${databaseError.message}", Toast.LENGTH_SHORT).show()
            }
        })
    }


    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}
