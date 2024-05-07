package com.example.app_005

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.navigation.fragment.findNavController
import com.example.app_005.databinding.FragmentHomeBinding

class HomeFragment : Fragment() {

    private var homeFragment : FragmentHomeBinding? = null

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        // Inflate the layout for this fragment
        val binding = FragmentHomeBinding.inflate(inflater, container, false)
        homeFragment = binding

        binding.NextButton.setOnClickListener {
            findNavController().navigate(R.id.action_homeFragment_to_addkFragment)

        }

        binding.Imagebutton.setOnClickListener {
            findNavController().navigate(R.id.action_homeFragment_to_imageFragment)
        }

        return binding.root
    }

}