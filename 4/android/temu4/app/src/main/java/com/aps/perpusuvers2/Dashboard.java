package com.aps.perpusuvers2;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class Dashboard extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard);

        // Find the Button by its ID
        Button movePageButton = findViewById(R.id.movePage);

        // Set an OnClickListener for the Button
        movePageButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Create an Intent to start the MainActivity
                Intent intent = new Intent(Dashboard.this, MainActivity.class);

                // Start the MainActivity
                startActivity(intent);
            }
        });
    }
}
