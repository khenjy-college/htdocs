package com.example.tugas;

import static android.provider.Settings.Global.getString;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.concurrent.CopyOnWriteArrayList;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

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
        try {
            // Load XML file
            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
            Document doc = dBuilder.parse(context.getResources().openRawResource(R.raw.strings)); // Assuming strings.xml is stored in res/raw folder
            doc.getDocumentElement().normalize();

            // Get all string elements
            NodeList stringNodes = doc.getElementsByTagName("string");

            // Iterate through string elements
            for (int i = 0; i < stringNodes.getLength(); i++) {
                Node stringNode = stringNodes.item(i);
                if (stringNode.getNodeType() == Node.ELEMENT_NODE) {
                    Element stringElement = (Element) stringNode;
                    String name = stringElement.getAttribute("name");
                    String value = stringElement.getTextContent();

                    // Check if it's a field name or alias
                    if (name.endsWith("_field") || name.endsWith("_alias")) {
                        // Create corresponding variable dynamically
                        // Example: For field "tabel4_field1", create "txt_tabel4_field1" variable
                        String variableName = value;
                        // Use these variables as needed
                        Log.d("Data", "Variable created: " + variableName);
                    } else if (name.startsWith("tabel")) {
                        // Create table creation SQL based on table names and field names
                        // Add your table creation logic here
                        Log.d("Data", "Table created: " + value);
                    }
                }
            }

            copyXMLContent();
            insertTabel7();


        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void insertTabel7() {
        SQLiteDatabase db = this.getWritableDatabase();

        // Example: Insert data into table1
        ContentValues values = new ContentValues();
        values.put(context.getString(R.string.tabel7_field1), "1");
        values.put(context.getString(R.string.tabel7_field2), "HOTEL HEBAT");
        values.put(context.getString(R.string.tabel7_field3), "favicon.jpg");
        values.put(context.getString(R.string.tabel7_field4), "logo.jpg");
        values.put(context.getString(R.string.tabel7_field5), "foto.jpg");
        values.put(context.getString(R.string.tabel7_field6), "Jl Peternakan Dlm III 36, Dki Jakarta");
        values.put(context.getString(R.string.tabel7_field7), "hotelhebat@gmail.com");
        values.put(context.getString(R.string.tabel7_field8), "0-21-541-3829");
        values.put(context.getString(R.string.tabel7_field9), "Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid's Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.");
        values.put(context.getString(R.string.tabel7_field10), "http://www.facebook.com/hotel.hebat/");
        values.put(context.getString(R.string.tabel7_field11), "http://www.instagram.com/hotelhebat/");
        // Add more values as needed

        // Insert the data
        long newRowId = db.insert("table1", null, values);

        // Repeat the above steps for other tables and data

        db.close();
    }

    public void copyXMLContent() {
        String sourceFilePath = context.getResources().openRawResource(R.raw.strings).toString();
        String targetFilePath = context.getFilesDir() + File.separator + "strings.xml";

        try {
            File sourceFile = new File(sourceFilePath);
            File targetFile = new File(targetFilePath);

            // Parse the source XML file
            DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
            DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
            Document sourceDoc = dBuilder.parse(new FileInputStream(sourceFile));

            // Write the parsed content to the target XML file
            FileOutputStream fos = new FileOutputStream(targetFile);
            writeDocument(sourceDoc, fos);
            fos.close();

            Log.d("Data", "XML content copied successfully.");
        } catch (ParserConfigurationException | SAXException | IOException e) {
            e.printStackTrace();
        }
    }

    private void writeDocument(Document doc, FileOutputStream fos) {
        // Writing the document to the output stream
        javax.xml.transform.TransformerFactory transformerFactory = javax.xml.transform.TransformerFactory.newInstance();
        javax.xml.transform.Transformer transformer;
        try {
            transformer = transformerFactory.newTransformer();
            javax.xml.transform.dom.DOMSource source = new javax.xml.transform.dom.DOMSource(doc);
            javax.xml.transform.stream.StreamResult result = new javax.xml.transform.stream.StreamResult(fos);
            transformer.transform(source, result);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }


    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Implement if needed
    }
}
