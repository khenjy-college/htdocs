package com.example.app_005

import android.app.Activity
import android.content.Intent
import android.graphics.Bitmap
import android.net.Uri
import android.os.Bundle
import android.provider.MediaStore
import android.view.Gravity
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.LinearLayout
import android.widget.TextView
import android.widget.Toast
import androidx.fragment.app.Fragment
import com.bumptech.glide.Glide
import com.example.app_005.databinding.FragmentImageBinding
import com.example.app_005.models.mahasiswa
import com.google.firebase.database.DatabaseReference
import com.google.firebase.database.ktx.database
import com.google.firebase.ktx.Firebase
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference
import java.util.*

class ImageFragment : Fragment() {

    private var _binding: FragmentImageBinding? = null
    private val binding get() = _binding!!

    private lateinit var database: DatabaseReference
    private lateinit var storageRef: StorageReference // tambahkan deklarasi variabel storageRef

    private val PICK_IMAGE_REQUEST = 71
    private var filePath: Uri? = null

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentImageBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        database = Firebase.database.reference
        storageRef = FirebaseStorage.getInstance().reference // inisialisasi storageRef

        binding.pickImage.setOnClickListener {
            val intent = Intent()
            intent.type = "image/*"
            intent.action = Intent.ACTION_GET_CONTENT
            startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_REQUEST)
        }

        binding.saveBtn.setOnClickListener {
            saveData()
        }

        readData()
    }


    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if (requestCode == PICK_IMAGE_REQUEST && resultCode == Activity.RESULT_OK && data != null && data.data != null) {
            filePath = data.data // Set filePath to the selected image URI
            try {
                val bitmap = MediaStore.Images.Media.getBitmap(requireActivity().contentResolver, filePath)
                binding.imageView.setImageBitmap(bitmap)
            } catch (e: Exception) {
                e.printStackTrace()
            }
        }
    }
    private fun readData() {
        database.child("mahasiswa").get().addOnSuccessListener { dataSnapshot ->
            for (data in dataSnapshot.children) {
                val mahasiswa = data.getValue(mahasiswa::class.java)
                mahasiswa?.let {
                    val imageUrl = it.imageUrl
                    val name = it.name

                    // Create LinearLayout as container
                    val linearLayout = LinearLayout(requireContext())
                    val params = LinearLayout.LayoutParams(
                        resources.getDimensionPixelSize(R.dimen.linear_layout_width),
                        LinearLayout.LayoutParams.WRAP_CONTENT
                    )
                    linearLayout.layoutParams = params
                    linearLayout.orientation = LinearLayout.VERTICAL

                    // Create ImageView
                    val imageView = ImageView(requireContext())
                    imageView.layoutParams = LinearLayout.LayoutParams(
                        LinearLayout.LayoutParams.MATCH_PARENT,
                        LinearLayout.LayoutParams.WRAP_CONTENT
                    )
                    Glide.with(requireContext()).load(imageUrl).into(imageView)

                    // Create TextView
                    val textView = TextView(requireContext())
                    textView.layoutParams = LinearLayout.LayoutParams(
                        LinearLayout.LayoutParams.MATCH_PARENT,
                        LinearLayout.LayoutParams.WRAP_CONTENT
                    )
                    textView.text = name
                    textView.gravity = Gravity.CENTER

                    // Add ImageView and TextView to LinearLayout
                    linearLayout.addView(imageView)
                    linearLayout.addView(textView)

                    // Add LinearLayout to GridLayout
                    binding.gridLayoutItem.addView(linearLayout)
                }
            }
        }.addOnFailureListener { e ->
            Toast.makeText(context, "Error: ${e.message}", Toast.LENGTH_SHORT).show()
        }
    }



    private fun saveData() {
        val name = binding.inputName.text.toString()
        val phone = binding.inputPhone.text.toString()

        if (name.isEmpty()) {
            binding.inputName.error = "Write a name"
            return
        }

        if (phone.isEmpty()) {
            binding.inputPhone.error = "Write a phone number"
            return
        }

        if (filePath == null) {
            Toast.makeText(requireContext(), "Please select an image", Toast.LENGTH_SHORT).show()
            return
        }

        binding.saveBtn.isEnabled = false

        val ref = storageRef.child("images/${UUID.randomUUID()}")
        val uploadTask = ref.putFile(filePath!!)

        uploadTask.continueWithTask { task ->
            if (!task.isSuccessful) {
                task.exception?.let {
                    throw it
                }
            }
            ref.downloadUrl
        }.addOnCompleteListener { task ->
            if (task.isSuccessful) {
                binding.saveBtn.isEnabled = true

                val downloadUri = task.result
                val imageUrl = downloadUri.toString()

                val user = mahasiswa(name, phone, imageUrl)

                val databaseRef = database.child("mahasiswa").push()
                databaseRef.setValue(user)
                    .addOnSuccessListener {
                        Toast.makeText(requireContext(), "Data stored successfully", Toast.LENGTH_SHORT).show()

                        binding.inputName.setText("")
                        binding.inputPhone.setText("")
                        binding.imageView.setImageResource(R.mipmap.ic_launcher)

                        binding.gridLayoutItem.removeAllViews()

                        readData()
                    }
                    .addOnFailureListener { e ->
                        Toast.makeText(requireContext(), "Error: ${e.message}", Toast.LENGTH_SHORT).show()
                    }
            } else {
                Toast.makeText(requireContext(), "Failed to upload image", Toast.LENGTH_SHORT).show()
            }
        }
    }




    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}
