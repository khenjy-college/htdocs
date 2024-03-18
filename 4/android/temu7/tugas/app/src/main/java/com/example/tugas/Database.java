package com.example.tugas;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class Database extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "tugas.db";
    private static final int DATABASE_VERSION = 1;

    public Database (Context context) {
        super (context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String sql1 = "CREATE TABLE mahasiswa (" +
                "nim TEXT, " +
                "nama TEXT, " +
                "prodi TEXT, " +
                "alamat TEXT, " +
                "tgl_lahir TEXT, " +
                "jenis_kelamin TEXT, " +
                "isActive TEXT);";

        String sql2 = "CREATE TABLE phonebook (" +
                "id TEXT, " +
                "nama TEXT, " +
                "no_hp TEXT, " +
                "tgl_lahir TEXT);";

        String sql3 = "CREATE TABLE bookmaster (" +
                "isbn TEXT, " +
                "nama TEXT, " +
                "tgl_tambah TEXT);";

        Log.d("Data", "onCreate: " + sql1);
        Log.d("Data", "onCreate: " + sql2);
        Log.d("Data", "onCreate: " + sql3);

        db.execSQL(sql1);
        db.execSQL(sql2);
        db.execSQL(sql3);
    }


    @Override
    public void onUpgrade (SQLiteDatabase db0, int db1, int db2) {

    }

}
