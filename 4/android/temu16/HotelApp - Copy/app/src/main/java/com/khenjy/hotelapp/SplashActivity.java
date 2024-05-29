package com.khenjy.hotelapp;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.khenjy.hotelapp.screens.LoginActivity;

public class SplashActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_splash);

        FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();

        // splash screen wait for 2 sec and then Launch Login activity
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                if (user != null)
                    // if user is already logged in then launch home activity
                    // else launch login activity
                    startActivity(new Intent(SplashActivity.this, MainActivity.class));
                else {
                    startActivity(new Intent(SplashActivity.this, LoginActivity.class));
                    finish();
                }
                finish();
            }
        },2000);
    }
}