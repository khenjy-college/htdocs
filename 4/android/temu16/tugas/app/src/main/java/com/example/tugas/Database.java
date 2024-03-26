package com.example.tugas;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class Database extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "tugas.db";
    private static final int DATABASE_VERSION = 1;
    private final Context context;

    public Database(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String sql4 = "CREATE TABLE " + context.getString(R.string.tabel4) + " (" +
                context.getString(R.string.tabel4_field1) + " TEXT, " +
                context.getString(R.string.tabel4_field2) + " TEXT, " +
                context.getString(R.string.tabel4_field3) + " TEXT, " +
                context.getString(R.string.tabel4_field4) + " TEXT, " +
                context.getString(R.string.tabel4_field5) + " TEXT);";


        String sql5 = "CREATE TABLE " + context.getString(R.string.tabel5) + " (" +
                context.getString(R.string.tabel5_field1) + " TEXT, " +
                context.getString(R.string.tabel5_field2) + " TEXT, " +
                context.getString(R.string.tabel5_field3) + " TEXT, " +
                context.getString(R.string.tabel5_field4) + " TEXT, " +
                context.getString(R.string.tabel5_field5) + " TEXT);";

        String sql6 = "CREATE TABLE " + context.getString(R.string.tabel6) + " (" +
                context.getString(R.string.tabel6_field1) + " TEXT, " +
                context.getString(R.string.tabel6_field2) + " TEXT, " +
                context.getString(R.string.tabel6_field3) + " TEXT, " +
                context.getString(R.string.tabel6_field4) + " TEXT);";

        String sql7 = "CREATE TABLE " + context.getString(R.string.tabel7) + " (" +
                context.getString(R.string.tabel7_field1) + " TEXT, " +
                context.getString(R.string.tabel7_field2) + " TEXT, " +
                context.getString(R.string.tabel7_field3) + " TEXT, " +
                context.getString(R.string.tabel7_field4) + " TEXT, " +
                context.getString(R.string.tabel7_field5) + " TEXT, " +
                context.getString(R.string.tabel7_field6) + " TEXT, " +
                context.getString(R.string.tabel7_field7) + " TEXT, " +
                context.getString(R.string.tabel7_field8) + " TEXT, " +
                context.getString(R.string.tabel7_field9) + " TEXT, " +
                context.getString(R.string.tabel7_field10) + " TEXT, " +
                context.getString(R.string.tabel7_field11) + " TEXT, ";



        // Add more table creations using other string resources as needed

        Log.d("Data", "onCreate: " + sql4);
        Log.d("Data", "onCreate: " + sql5);
        Log.d("Data", "onCreate: " + sql6);
        Log.d("Data", "onCreate: " + sql7);

        db.execSQL(sql4);
        db.execSQL(sql5);
        db.execSQL(sql6);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Implement if needed
    }
}
