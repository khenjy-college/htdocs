package com.khenjy.hotelapp.fragments;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import com.bumptech.glide.Glide;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.khenjy.hotelapp.R;
import com.khenjy.hotelapp.databinding.FragmentProfileBinding;
import com.khenjy.hotelapp.model.User;

public class ProfileFragment extends Fragment {

    private FragmentProfileBinding binding;
    private DatabaseReference database;
    private Context fragmentContext;

    @Override
    public void onAttach(@NonNull Context context) {
        super.onAttach(context);
        fragmentContext = context; // Store fragment context when fragment is attached
    }

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        binding = FragmentProfileBinding.inflate(inflater, container, false);
        return binding.getRoot();
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        clearData();
        SharedPreferences sharedPref = requireActivity().getSharedPreferences("userSession", Context.MODE_PRIVATE);
        String userNim = sharedPref.getString("userNim", null);
        Log.e("ProfileFragment", "User nim = " + userNim);
        readData(userNim);
    }

    private void clearData() {
        binding.userName.setText("");
        binding.userEmail.setText("");
        binding.roleEditText.setText("");
        binding.nimEditText.setText("");
        binding.profileImage.setImageDrawable(null);
    }

    private void readData(String userNim) {
        if (userNim != null) {
            // Get user data from Firebase
            database = FirebaseDatabase.getInstance().getReference();
            database.child("users").orderByChild("nim").equalTo(userNim)
                    .addListenerForSingleValueEvent(new ValueEventListener() {
                        @Override
                        public void onDataChange(@NonNull DataSnapshot snapshot) {
                            if (snapshot.exists()) {
                                for (DataSnapshot userSnapshot : snapshot.getChildren()) {
                                    User user = userSnapshot.getValue(User.class);
                                    if (user != null) {
                                        binding.userName.setText(user.getName());
                                        binding.userEmail.setText(user.getEmail());
                                        binding.roleEditText.setText(user.getRole());
                                        binding.nimEditText.setText(user.getNim());

                                        String userProfileImageUrl = user.getImage();
                                        if (userProfileImageUrl != null && !userProfileImageUrl.isEmpty()) {
                                            Glide.with(fragmentContext)
                                                    .load(userProfileImageUrl)
                                                    .placeholder(R.drawable.placeholder_image) // Placeholder image while loading
                                                    .error(R.drawable.error_image) // Error image if loading fails
                                                    .into(binding.profileImage);
                                        } else {
                                            binding.profileImage.setImageResource(R.drawable.ic_account); // Placeholder image
                                        }
                                    }
                                }
                            } else {
                                Log.e("ProfileFragment", "User data not found");
                            }
                        }

                        @Override
                        public void onCancelled(@NonNull DatabaseError error) {
                            Log.e("ProfileFragment", "Error fetching data", error.toException());
                        }
                    });
        } else {
            Log.e("ProfileFragment", "NIM not found in SharedPreferences");
        }
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }
}
