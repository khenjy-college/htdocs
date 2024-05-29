package com.khenjy.hotelapp.screens;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.util.Patterns;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.AppCompatButton;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.khenjy.hotelapp.MainActivity;
import com.khenjy.hotelapp.R;

public class LoginActivity extends AppCompatActivity {

    private TextView createAccount;
    private EditText email, password;
    private AppCompatButton loginButton;
    private FirebaseAuth mAuth;
    private static final int BACK_PRESS_INTERVAL = 2000; // 2 seconds
    private long backPressTime;

    private static final int LOGIN_TIMEOUT = 10000; // 10 seconds
    private Handler timeoutHandler = new Handler();
    private Runnable timeoutRunnable;
    @Override
    public void onBackPressed() {
        if (backPressTime + BACK_PRESS_INTERVAL > System.currentTimeMillis()) {
            super.onBackPressed();
            finishAffinity(); // Closes the app completely
        } else {
            Toast.makeText(this, "Press back again to exit.", Toast.LENGTH_SHORT).show();
        }
        backPressTime = System.currentTimeMillis();
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_login);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        createAccount = findViewById(R.id.dont_have_account);
        email = findViewById(R.id.user_email);
        password = findViewById(R.id.user_password);
        loginButton = findViewById(R.id.login_button);

        mAuth = FirebaseAuth.getInstance();

        createAccount.setOnClickListener(v -> {
            Intent intent = new Intent(this, SignUpActivity.class);
            startActivity(intent);
        });


        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (!email.getText().toString().trim().isEmpty() && emailChecker(email.getText().toString().trim())) {
                    if(!password.getText().toString().isEmpty()) {
                        // Start the login timeout
                        startLoginTimeout();

                        loginUser(email.getText().toString().trim(), password.getText().toString().trim());
                    } else {
                        Toast.makeText(LoginActivity.this, "Please enter your password", Toast.LENGTH_SHORT).show();
                    }
                } else {
                    Toast.makeText(LoginActivity.this, "Please enter your email", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    // Method to start the login timeout
    private void startLoginTimeout() {
        timeoutRunnable = new Runnable() {
            @Override
            public void run() {
                // Timeout logic, e.g., show a message or take action
                Toast.makeText(LoginActivity.this, "Login attempt timed out", Toast.LENGTH_SHORT).show();
                // Optionally, cancel the ongoing login attempt
                // mAuth.signOut(); // Sign out the user if the login attempt times out
            }
        };
        timeoutHandler.postDelayed(timeoutRunnable, LOGIN_TIMEOUT);
    }

    // Method to cancel the login timeout if login is successful
    private void cancelLoginTimeout() {
        if (timeoutRunnable != null) {
            timeoutHandler.removeCallbacks(timeoutRunnable);
        }
    }

    boolean emailChecker(String email) {
        return Patterns.EMAIL_ADDRESS.matcher(email).matches();
    }


    void loginUser (String email, String password) {
        mAuth.signInWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                // Cancel the login timeout when the login attempt is completed
                cancelLoginTimeout();
                if(task.isSuccessful()) {
                    Toast.makeText(LoginActivity.this, "Successful Login", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                } else {
                    Toast.makeText(LoginActivity.this, "Fail", Toast.LENGTH_SHORT).show();
                }
            }
        }).addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e) {
                // Cancel the login timeout on failure as well
                cancelLoginTimeout();
                Toast.makeText(LoginActivity.this, "Fail", Toast.LENGTH_SHORT).show();
            }
        });
    }
}