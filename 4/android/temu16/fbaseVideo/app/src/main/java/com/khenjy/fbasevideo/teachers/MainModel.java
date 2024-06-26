package com.khenjy.fbasevideo.teachers;

import static android.content.ContentValues.TAG;

import android.util.Log;

import androidx.annotation.NonNull;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.IgnoreExtraProperties;
import com.google.firebase.database.ValueEventListener;

@IgnoreExtraProperties
public class MainModel {
    String name, course, email, turl;

    private static final String TAG = "MainModel";

    MainModel()
    {

    }
    public MainModel(String name, String course, String email, String turl) {
        this.name = name;
        this.course = course;
        this.email = email;
        this.turl = turl;


    }


    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getCourse() {
        return course;
    }

    public void setCourse(String course) {
        this.course = course;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTurl() {
        return turl;
    }

    public void setTurl(String turl) {
        this.turl = turl;
    }


}
