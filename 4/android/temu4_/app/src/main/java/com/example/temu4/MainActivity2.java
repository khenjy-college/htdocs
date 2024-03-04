package com.example.temu4;

import com.example.temu4.*;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity2 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
    }

    public void panggil(View view) {
        String nomor = "09667347";
        Intent panggil = new Intent (Intent.ACTION_DIAL);
        panggil.setData(Uri.fromParts("tel", nomor, null));
        startActivity(panggil);
    }

    public void buka (View view) {
        String url = "https://badoystudio.com";
        Intent bukabrowser = new Intent(Intent.ACTION_VIEW);
        bukabrowser.setData(Uri.parse(url));
        startActivity(bukabrowser);
    }


}