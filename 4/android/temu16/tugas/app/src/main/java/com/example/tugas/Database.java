package com.example.tugas;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class Database extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "YourDatabaseName.db";
    private static final int DATABASE_VERSION = 1;

    public Database(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        // Table 5: kamar
        String createTableKamar = "CREATE TABLE kamar (" +
                "no_kamar TEXT," +
                "id_tipe INTEGER," +
                "id_pesanan INTEGER," +
                "status TEXT," +
                "keterangan TEXT" +
                ")";
        db.execSQL(createTableKamar);

        // Table 6: tipe_kamar
        String createTableTipeKamar = "CREATE TABLE tipe_kamar (" +
                "id_tipe INTEGER," +
                "tipe TEXT," +
                "img TEXT," +
                "stok INTEGER," +
                "harga REAL" +
                ")";
        db.execSQL(createTableTipeKamar);

        // Table 7: pengaturan
        String createTablePengaturan = "CREATE TABLE pengaturan (" +
                "id INTEGER," +
                "nama TEXT," +
                "favicon TEXT," +
                "logo TEXT," +
                "foto TEXT," +
                "alamat TEXT," +
                "email TEXT," +
                "hp TEXT," +
                "metadesc TEXT," +
                "fb TEXT," +
                "ig TEXT," +
                "id_event INTEGER" +
                ")";
        db.execSQL(createTablePengaturan);

        // Table 8: pesanan
        String createTablePesanan = "CREATE TABLE pesanan (" +
                "id_pesanan INTEGER," +
                "id_user INTEGER," +
                "pemesan TEXT," +
                "email TEXT," +
                "hp TEXT," +
                "tamu INTEGER," +
                "id_tipe_kamar INTEGER," +
                "jlh INTEGER," +
                "harga_total REAL," +
                "cek_in TEXT," +
                "cek_out TEXT," +
                "status TEXT," +
                "no_kamar TEXT" +
                ")";
        db.execSQL(createTablePesanan);

        // Table 9: user
        String createTableUser = "CREATE TABLE user (" +
                "id_user INTEGER," +
                "nama TEXT," +
                "email TEXT," +
                "password TEXT," +
                "hp TEXT," +
                "level INTEGER," +
                "login_count INTEGER" +
                ")";
        db.execSQL(createTableUser);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Drop older tables if existed
        db.execSQL("DROP TABLE IF EXISTS kamar");
        db.execSQL("DROP TABLE IF EXISTS tipe_kamar");
        db.execSQL("DROP TABLE IF EXISTS pengaturan");
        db.execSQL("DROP TABLE IF EXISTS pesanan");
        db.execSQL("DROP TABLE IF EXISTS user");


        // Create tables again
        onCreate(db);
    }

    // Example method to demonstrate how to call insert methods
    public void insertDataIntoTables(Context context) {
        // Create an instance of your Database class
        Database database = new Database(context);

        // Open the database for writing
        SQLiteDatabase db = database.getWritableDatabase();

        // Insert data into the kamar table
        long kamarRowId = database.insertDataIntoKamar("101", 1, 1, "available", "Standard room");
        // Check if insertion was successful
        if (kamarRowId != -1) {
            // Data inserted successfully
        } else {
            // Failed to insert data
        }

        // Insert data into the tipe_kamar table
        long tipeKamarRowId = database.insertDataIntoTipeKamar(1, "Standard", "standard_img.jpg", 10, 50.0);
        // Check if insertion was successful
        if (tipeKamarRowId != -1) {
            // Data inserted successfully
        } else {
            // Failed to insert data
        }

        // Close the database connection
        db.close();
    }

    // Method to insert data into kamar table
    public long insertDataIntoKamar(String noKamar, int idTipe, int idPesanan, String status, String keterangan) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put("no_kamar", noKamar);
        values.put("id_tipe", idTipe);
        values.put("id_pesanan", idPesanan);
        values.put("status", status);
        values.put("keterangan", keterangan);
        long newRowId = db.insert("kamar", null, values);
        db.close();
        return newRowId;
    }

    // Method to insert data into tipe_kamar table
    public long insertDataIntoTipeKamar(int idTipe, String tipe, String img, int stok, double harga) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put("id_tipe", idTipe);
        values.put("tipe", tipe);
        values.put("img", img);
        values.put("stok", stok);
        values.put("harga", harga);
        long newRowId = db.insert("tipe_kamar", null, values);
        db.close();
        return newRowId;
    }
}