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
        String sql3 = "CREATE TABLE fashotel (" +
                "id_fashotel TEXT, " +
                "nama TEXT, " +
                "keterangan TEXT, " +
                "img TEXT );";

        String sql1 = "CREATE TABLE faskamar (" +
                "id_faskamar TEXT, " +
                "tipe TEXT, " +
                "nama TEXT, " +
                "img TEXT);";

        String sql2 = "CREATE TABLE history (" +
                "id_history TEXT, " +
                "id_pesanan TEXT, " +
                "id_user TEXT, " +
                "pemesanan TEXT, " +
                "email TEXT, " +
                "hp TEXT, " +
                "tamu TEXT, " +
                "id_tipe TEXT, " +
                "jlh TEXT, " +
                "harga_total TEXT, " +
                "cek_in TEXT, " +
                "cek_out TEXT, " +
                "no_kamar TEXT, " +
                "tgl_perubahan TEXT, " +
                "user_aktif TEXT);";

        String sql5 = "CREATE TABLE kamar (" +
                "no_kamar TEXT, " +
                "id_tipe TEXT, " +
                "id_pesanan TEXT, " +
                "status TEXT, " +
                "keterangan TEXT);";

        String sql11 = "CREATE TABLE operation (" +
                "id_operation TEXT, " +
                "no_kamar TEXT, " +
                "id_user TEXT, " +
                "id_petugas TExT, " +
                "status TEXT, " +
                "keterangan TEXT, " +
                "tgl_perubahan TEXT);";

        String sql7 = "CREATE TABLE pengaturan (" +
                "id TEXT, " +
                "nama TEXT, " +
                "favicon TEXT, " +
                "logo TEXT, " +
                "foto TEXT, " +
                "alamat TEXT, " +
                "email TEXT, " +
                "hp TEXT, " +
                "metadesc TEXT, " +
                "fb TEXT, " +
                "ig TEXT);";

        String sql8 = "CREATE TABLE pesanan (" +
                "id_pesanan TEXT, " +
                "id_user TEXT, " +
                "pemesan TEXT, " +
                "email TEXT, " +
                "hp TEXT, " +
                "tamu TEXT, " +
                "id_tipe TEXT, " +
                "jlh TEXT, " +
                "harga_total TEXT, " +
                "cek_in TEXT, " +
                "cek_out TEXT, " +
                "status TEXT, " +
                "no_kamar TEXT);";

        String sql4 = "CREATE TABLE petugas (" +
                "id_petugas TEXT, " +
                "nama TEXT, " +
                "email TEXT, " +
                "hp TEXT, " +
                "img TEXT, " +
                "role TEXT, " +
                "poin TEXT);";

        String sql6 = "CREATE TABLE tipe_kamar (" +
                "id_tipe TEXT, " +
                "tipe TEXT, " +
                "img TEXT, " +
                "stok TEXT, " +
                "harga TEXT);";

        String sql10 = "CREATE TABLE transaksi (" +
                "id_transaksi TEXT, " +
                "id_user TEXT, " +
                "email TEXT, " +
                "id_pesanan TEXT, " +
                "metode TEXT, " +
                "bayar TEXT, " +
                "tgl_transaksi TEXT);";

        String sql9 = "CREATE TABLE user (" +
                "id_user TEXT, " +
                "nama TEXT, " +
                "email TEXT, " +
                "password TEXT, " +
                "hp TEXT, " +
                "level TEXT, " +
                "login_count TEXT);";

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
    public void onUpgrade (SQLiteDatabase db0, int db1, int db2) {

    }

}
