package com.example.temu9.Activity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.temu9.APIRequestData;
import com.example.temu9.R;
import com.example.temu9.ResponseModel;
import com.example.temu9.RetrofitClient;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class UbahActivity extends AppCompatActivity {

    private int xId;
    private String xNama, xAlamat, xTelepon;
    private EditText etNama, etAlamat, etTelepon;
    private Button btnUbah;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ubah);

        Intent terima = getIntent();
        xId = terima.getIntExtra("xId", -1);
        xNama = terima.getStringExtra("xNama");
        xAlamat = terima.getStringExtra("xAlamat");
        xTelepon = terima.getStringExtra("xTelepon");

        etNama = findViewById(R.id.et_nama);
        etAlamat = findViewById(R.id.et_alamat);
        etTelepon = findViewById(R.id.et_telepon);
        btnUbah = findViewById(R.id.btn_ubah);

        etNama.setText(xNama);
        etAlamat.setText(xAlamat);
        etTelepon.setText(xTelepon);

        btnUbah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String yNama = etNama.getText().toString();
                String yAlamat = etAlamat.getText().toString();
                String yTelepon = etTelepon.getText().toString();

                updateData(xId, yNama, yAlamat, yTelepon);
            }
        });
    }

    private void updateData(int xId, String yNama, String yAlamat, String yTelepon) {
        APIRequestData ardData = RetrofitClient.konekRetrofit().create(APIRequestData.class);
        Call<ResponseModel> ubahData = ardData.ardUpdateData(xId, yNama, yAlamat, yTelepon);
        ubahData.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                if (response.isSuccessful() && response.body() != null) {
                    int kode = response.body().getKode();
                    String pesan = response.body().getPesan();
                    Toast.makeText(UbahActivity.this, "Kode: " + kode + " | Pesan: " + pesan, Toast.LENGTH_SHORT).show();
                    finish();
                } else {
                    Toast.makeText(UbahActivity.this, "Gagal mendapatkan response dari server", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                Toast.makeText(UbahActivity.this, "Gagal Menghubungi Server | " + t.getMessage(), Toast.LENGTH_LONG).show();
            }
        });
    }
}
