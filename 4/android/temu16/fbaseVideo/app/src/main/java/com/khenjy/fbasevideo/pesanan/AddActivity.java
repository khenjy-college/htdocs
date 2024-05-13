package com.khenjy.fbasevideo.pesanan;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.FirebaseDatabase;
import com.khenjy.fbasevideo.R;

import java.util.HashMap;
import java.util.Map;

public class AddActivity extends AppCompatActivity {
    EditText id_user, id_tipe, jlh, turl;
    Button btnAdd, btnBack;
    MainAdapter mainAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.teachers_activity_add);
        id_user = (EditText) findViewById(R.id.txtName);
        id_tipe = (EditText) findViewById(R.id.txtCourse);
        jlh = (EditText) findViewById(R.id.txtEmail);
        btnAdd = (Button) findViewById(R.id.btnAdd);
        btnBack = (Button) findViewById(R.id.btnBack);
        btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                insertData()    ;
                clearAll();
            }
        });

        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getApplicationContext(), MainActivity.class));
            }
        });
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        startActivity(new Intent(AddActivity.this, MainActivity.class));
        finish(); // Finish the current activity
    }

    private void insertData() {
        Map<String, Object> map = new HashMap<>();
        map.put("id_user", id_user.getText().toString());
        map.put("id_tipe", id_tipe.getText().toString());
        map.put("jlh", jlh.getText().toString());
        FirebaseDatabase.getInstance().getReference().child("teachers").push()
                .setValue(map)
                .addOnSuccessListener(new OnSuccessListener<Void>() {
                    @Override
                    public void onSuccess(Void unused) {
                        Toast.makeText(AddActivity.this,
                                "Data Inserted Successfully.", Toast.LENGTH_SHORT).show();
                    }
                })
                .addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(Exception e) {
                        Toast.makeText(AddActivity.this,
                                "Error while Insertion.", Toast.LENGTH_SHORT).show();
                    }
                });
    }

    private void clearAll() {
        id_user.setText("");
        id_tipe.setText("");
        jlh.setText("");
    }
}