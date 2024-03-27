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
        String sql1 = "";

        String sql2 = "CREATE TABLE " + context.getString(R.string.tabel2) + " (" +
                context.getString(R.string.tabel2_field1) + " TEXT, " +
                context.getString(R.string.tabel2_field2) + " TEXT, " +
                context.getString(R.string.tabel2_field3) + " TEXT, " +
                context.getString(R.string.tabel2_field4) + " TEXT, " +
                context.getString(R.string.tabel2_field5) + " TEXT);";

        String sql3 = "";

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

        String sql8 = "CREATE TABLE " + context.getString(R.string.tabel8) + " (" +
                context.getString(R.string.tabel8_field1) + " TEXT, " +
                context.getString(R.string.tabel8_field2) + " TEXT, " +
                context.getString(R.string.tabel8_field3) + " TEXT, " +
                context.getString(R.string.tabel8_field4) + " TEXT, " +
                context.getString(R.string.tabel8_field5) + " TEXT, " +
                context.getString(R.string.tabel8_field6) + " TEXT, " +
                context.getString(R.string.tabel8_field7) + " TEXT, " +
                context.getString(R.string.tabel8_field8) + " TEXT, " +
                context.getString(R.string.tabel8_field9) + " TEXT, " +
                context.getString(R.string.tabel8_field10) + " TEXT, " +
                context.getString(R.string.tabel8_field11) + " TEXT, " +
                context.getString(R.string.tabel8_field12) + " TEXT, " +
                context.getString(R.string.tabel8_field13) + " TEXT, ";

        String sql9 = "CREATE TABLE " + context.getString(R.string.tabel9) + " (" +
                context.getString(R.string.tabel8_field1) + " TEXT, " +
                context.getString(R.string.tabel8_field2) + " TEXT, " +
                context.getString(R.string.tabel8_field3) + " TEXT, " +
                context.getString(R.string.tabel8_field4) + " TEXT, " +
                context.getString(R.string.tabel8_field5) + " TEXT, " +
                context.getString(R.string.tabel8_field6) + " TEXT, " +
                context.getString(R.string.tabel8_field7) + " TEXT, ";

        String sql10 = "CREATE TABLE " + context.getString(R.string.tabel10) + " (" +
                context.getString(R.string.tabel10_field1) + " TEXT, " +
                context.getString(R.string.tabel10_field2) + " TEXT, " +
                context.getString(R.string.tabel10_field3) + " TEXT, " +
                context.getString(R.string.tabel10_field4) + " TEXT, " +
                context.getString(R.string.tabel10_field5) + " TEXT);";

        String sql11 = "";


        // Add more table creations using other string resources as needed

        Log.d("Data", "onCreate: " + sql1);
        Log.d("Data", "onCreate: " + sql2);
        Log.d("Data", "onCreate: " + sql3);
        Log.d("Data", "onCreate: " + sql4);
        Log.d("Data", "onCreate: " + sql5);
        Log.d("Data", "onCreate: " + sql6);
        Log.d("Data", "onCreate: " + sql7);
        Log.d("Data", "onCreate: " + sql8);
        Log.d("Data", "onCreate: " + sql9);
        Log.d("Data", "onCreate: " + sql10);
        Log.d("Data", "onCreate: " + sql11);

        db.execSQL(sql1);
        db.execSQL(sql2);
        db.execSQL(sql3);
        db.execSQL(sql4);
        db.execSQL(sql5);
        db.execSQL(sql6);
        db.execSQL(sql7);
        db.execSQL(sql8);
        db.execSQL(sql9);
        db.execSQL(sql10);
        db.execSQL(sql11);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Implement if needed
    }
}
