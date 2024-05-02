package com.khenjy.test;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Bundle;
import android.provider.BaseColumns;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import androidx.appcompat.app.AppCompatActivity;
import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    private DatabaseHelper dbHelper;
    private ListView listView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        dbHelper = new DatabaseHelper(this);
        listView = findViewById(R.id.listView);

        // Create sample data
        createSampleData();

        // Display data
        displayData();

        // Example of triggering forms via popup
        // You can implement CRUD operations similarly
        listView.setOnItemClickListener((adapterView, view, position, l) -> {
            String selectedItem = (String) listView.getItemAtPosition(position);
            // Show popup to edit or delete the selected item
            // You can implement edit and delete operations in this popup
        });
    }

    private void createSampleData() {
        SQLiteDatabase db = dbHelper.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(DatabaseContract.FeedEntry.COLUMN_NAME_TITLE, "Title 1");
        // Add other columns data similarly
        db.insert(DatabaseContract.FeedEntry.TABLE_NAME, null, values);
        // Add more sample data if needed
    }

    private void displayData() {
        SQLiteDatabase db = dbHelper.getReadableDatabase();
        String[] projection = {DatabaseContract.FeedEntry.COLUMN_NAME_TITLE};
        Cursor cursor = db.query(
                DatabaseContract.FeedEntry.TABLE_NAME,
                projection,
                null,
                null,
                null,
                null,
                null
        );
        ArrayList<String> data = new ArrayList<>();
        while (cursor.moveToNext()) {
            String title = cursor.getString(cursor.getColumnIndexOrThrow(DatabaseContract.FeedEntry.COLUMN_NAME_TITLE));
            // Add other columns data similarly
            data.add(title);
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, data);
        listView.setAdapter(adapter);
    }
}

class DatabaseHelper extends SQLiteOpenHelper {

    private static final int DATABASE_VERSION = 1;
    private static final String DATABASE_NAME = "FeedReader.db";

    DatabaseHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(DatabaseContract.SQL_CREATE_ENTRIES);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(DatabaseContract.SQL_DELETE_ENTRIES);
        onCreate(db);
    }
}

final class DatabaseContract {

    private DatabaseContract() {}

    // Define table contents
    static class FeedEntry implements BaseColumns {
        static final String TABLE_NAME = "entry";
        static final String COLUMN_NAME_TITLE = "title";
        // Add other columns similarly
    }

    static final String SQL_CREATE_ENTRIES =
            "CREATE TABLE " + FeedEntry.TABLE_NAME + " (" +
                    BaseColumns._ID + " INTEGER PRIMARY KEY," +
                    FeedEntry.COLUMN_NAME_TITLE + " TEXT)";

    static final String SQL_DELETE_ENTRIES = "DROP TABLE IF EXISTS " + FeedEntry.TABLE_NAME;
}
