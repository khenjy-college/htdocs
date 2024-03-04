package com.aps.perpusuvers2;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    private EditText hargaEmasEditText;
    private EditText nilaiKaratEditText;
    private EditText jumlahEmasEditText;
    private EditText upahPengrajin;
    private TextView textHarga;
    private TextView textJumlahEmas;
    private TextView textTotal;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        hargaEmasEditText = findViewById(R.id.HargaEmas);
        nilaiKaratEditText = findViewById(R.id.NilaiKarat);
        jumlahEmasEditText = findViewById(R.id.JumlahEmas);
        upahPengrajin = findViewById(R.id.UpahPengrajin);
        textHarga = findViewById(R.id.TextHarga);
        textJumlahEmas = findViewById(R.id.TextJumlahEmas);
        textTotal = findViewById(R.id.TextTotal);

        Button hitungButton = findViewById(R.id.BtnHitung);
        hitungButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                calculateAndDisplayResult();
            }
        });

        // If you want to reset the values, you can add an OnClickListener for the "Reset" button.
        Button resetButton = findViewById(R.id.BtnReset);
        resetButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Reset the values or perform any necessary actions.
                hargaEmasEditText.setText("");
                nilaiKaratEditText.setText("");
                jumlahEmasEditText.setText("");
                upahPengrajin.setText("");
                textHarga.setText("Harga");
                textJumlahEmas.setText("Jumlah Emas");
                textTotal.setText("Total");
            }
        });
    }

    private void calculateAndDisplayResult() {
        try {
            double hargaEmas = Double.parseDouble(hargaEmasEditText.getText().toString());
            double nilaiKarat = Double.parseDouble(nilaiKaratEditText.getText().toString());
            double jumlahEmas = Double.parseDouble(hargaEmasEditText.getText().toString());
            double biayaPembuatan = Double.parseDouble(upahPengrajin.getText().toString());


            double harga = (hargaEmas * nilaiKarat) / 24;


            //Rumusnya bisa dua jenis
            //            double total = jumlahEmas * (hargaEmas+biayaPembuatan);
            double total = (hargaEmas*jumlahEmas) + (biayaPembuatan*jumlahEmas * jumlahEmas);



            textHarga.setText(String.valueOf(harga));
            textJumlahEmas.setText((String.valueOf(jumlahEmas)));
            textTotal.setText((String.valueOf(total)));


            // You need to add the calculation and display for textJumlahEmas and textTotal here

        } catch (NumberFormatException e) {
            // Handle the case where the input is not a valid number
            textHarga.setText("Invalid input");
            textTotal.setText((String.valueOf("Invalid input")));
        }
    }
}
