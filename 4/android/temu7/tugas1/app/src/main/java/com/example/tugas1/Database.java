package com.example.tugas1;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class Database extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "mahasiswa.db";
    private static final int DATABASE_VERSION = 1;

    public Database (Context context) {
        super (context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate (SQLiteDatabase db) {
        String sql1 = "create table mahasiswa(" +
                "nama text null, " +
                "kampus text null);";
        Log.d("Data", "onCreate" + sql1);
        db.execSQL(sql1);

        String sql2 = "create table phonebook(" +
                "id int null, " +
                "nama text null, " +
                "no_hp text null, " +
                "tgl_lahir date null);";
        Log.d("Data", "onCreate" + sql2);
        db.execSQL(sql2);

        String sql3 = "create table bookmaster(" +
                "isbn int null, " +
                "nama text null, " +
                "tgl_tambah date null);";
        Log.d("Data", "onCreate" + sql3);
        db.execSQL(sql3);
    }

    @Override
    public void onUpgrade (SQLiteDatabase db0, int db1, int db2) {

    }

}
