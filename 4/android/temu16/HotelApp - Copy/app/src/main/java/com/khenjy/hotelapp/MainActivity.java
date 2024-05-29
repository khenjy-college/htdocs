package com.khenjy.hotelapp;

import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.navigation.NavigationBarView;
import com.khenjy.hotelapp.R;
import com.khenjy.hotelapp.fragments.AboutUsFragment;
import com.khenjy.hotelapp.fragments.HomeFragment;
import com.khenjy.hotelapp.fragments.ProfileFragment;

public class MainActivity extends AppCompatActivity implements NavigationBarView.OnItemSelectedListener {

    private BottomNavigationView bottomNavigationView;

    private static final int BACK_PRESS_INTERVAL = 2000; // 2 seconds
    private long backPressTime;
    @Override
    public void onBackPressed() {
        if (backPressTime + BACK_PRESS_INTERVAL > System.currentTimeMillis()) {
            super.onBackPressed();
            finishAffinity(); // Closes the app completely
        } else {
            Toast.makeText(this, "Press back again to exit.", Toast.LENGTH_SHORT).show();
        }
        backPressTime = System.currentTimeMillis();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        bottomNavigationView = findViewById(R.id.bottom_navigation);
        bottomNavigationView.setOnItemSelectedListener(this);
        loadFragment(new HomeFragment());
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        Fragment fragment = null;
        switch(item.getItemId()){
            case R.id.menu_home:
                fragment = new HomeFragment();
                break;
            case R.id.menu_about_us:
                fragment = new AboutUsFragment();
                break;
            case R.id.menu_profile:
                fragment = new ProfileFragment();
                break;
            default:
                // Handle unexpected menu item selection
                Log.e("MainActivity", "Unknown menu item selected");
                break;
        }
        return loadFragment(fragment);
    }


    boolean loadFragment(Fragment fragment){
        if (fragment != null){
            getSupportFragmentManager()
                    .beginTransaction()
                    .setCustomAnimations(R.anim.fade_in, R.anim.fade_out)
                    .replace(R.id.fragment_container, fragment)
                    .addToBackStack(null) // Add this line for back stack behavior
                    .commit();
            return true;
        }
        return false;
    }
}