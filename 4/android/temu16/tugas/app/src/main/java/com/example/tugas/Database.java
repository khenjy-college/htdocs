package com.example.tugas;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class Database extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "uas.db";
    private static final int DATABASE_VERSION = 1;
    private final Context context;

    public Database(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        String sql5 = "CREATE TABLE " + context.getString(R.string.tabel5) + " (" +
                context.getString(R.string.tabel5field1) + " INTEGER, " +
                context.getString(R.string.tabel5field2) + " INTEGER, " +
                context.getString(R.string.tabel5field3) + " INTEGER, " +
                context.getString(R.string.tabel5field4) + " TEXT, " +
                context.getString(R.string.tabel5field5) + " TEXT);";

        String sql6 = "CREATE TABLE " + context.getString(R.string.tabel6) + " (" +
                context.getString(R.string.tabel6field1) + " INTEGER, " +
                context.getString(R.string.tabel6field2) + " TEXT, " +
                context.getString(R.string.tabel6field3) + " TEXT, " +
                context.getString(R.string.tabel6field4) + " TEXT);";

        String sql7 = "CREATE TABLE " + context.getString(R.string.tabel7) + " (" +
                context.getString(R.string.tabel7field1) + " INTEGER, " +
                context.getString(R.string.tabel7field2) + " TEXT, " +
                context.getString(R.string.tabel7field3) + " TEXT, " +
                context.getString(R.string.tabel7field4) + " TEXT, " +
                context.getString(R.string.tabel7field5) + " TEXT, " +
                context.getString(R.string.tabel7field6) + " TEXT, " +
                context.getString(R.string.tabel7field7) + " TEXT, " +
                context.getString(R.string.tabel7field8) + " TEXT, " +
                context.getString(R.string.tabel7field9) + " TEXT, " +
                context.getString(R.string.tabel7field10) + " TEXT, " +
                context.getString(R.string.tabel7field11) + " TEXT, " +
                context.getString(R.string.tabel7field12) + " TEXT);";

        String sql8 = "CREATE TABLE " + context.getString(R.string.tabel8) + " (" +
                context.getString(R.string.tabel8field1) + " INTEGER, " +
                context.getString(R.string.tabel8field2) + " INTEGER, " +
                context.getString(R.string.tabel8field3) + " TEXT, " +
                context.getString(R.string.tabel8field4) + " TEXT, " +
                context.getString(R.string.tabel8field5) + " TEXT, " +
                context.getString(R.string.tabel8field6) + " TEXT, " +
                context.getString(R.string.tabel8field7) + " INTEGER, " +
                context.getString(R.string.tabel8field8) + " TEXT, " +
                context.getString(R.string.tabel8field9) + " TEXT, " +
                context.getString(R.string.tabel8field10) + " TEXT, " +
                context.getString(R.string.tabel8field11) + " TEXT, " +
                context.getString(R.string.tabel8field12) + " TEXT, " +
                context.getString(R.string.tabel8field13) + " TEXT);";

        String sql9 = "CREATE TABLE " + context.getString(R.string.tabel9) + " (" +
                context.getString(R.string.tabel8field1) + " INTEGER, " +
                context.getString(R.string.tabel8field2) + " INTEGER, " +
                context.getString(R.string.tabel8field3) + " TEXT, " +
                context.getString(R.string.tabel8field4) + " TEXT, " +
                context.getString(R.string.tabel8field5) + " TEXT, " +
                context.getString(R.string.tabel8field6) + " TEXT, " +
                context.getString(R.string.tabel8field7) + " INTEGER);";


        // Add more table creations using other string resources as needed

        Log.d("Data", "onCreate: " + sql5);
        Log.d("Data", "onCreate: " + sql6);
        Log.d("Data", "onCreate: " + sql7);
        Log.d("Data", "onCreate: " + sql8);
        Log.d("Data", "onCreate: " + sql9);

        db.execSQL(sql5);
        db.execSQL(sql6);
        db.execSQL(sql7);
        db.execSQL(sql8);
        db.execSQL(sql9);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Implement if needed
    }
}