package com.example.bernardo.kapp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import android.app.Activity;
import android.widget.ImageButton;
import android.widget.Toast;
import android.view.View;
import android.view.View.OnClickListener;
import android.net.Uri;
import android.content.Intent;
public class MainActivity extends AppCompatActivity {
    private static final String TAG = "MainActivity";
    ImageButton imageButton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
       /* addListenerOnButton();*/
    }

   /* public void addListenerOnButton() {

        imageButton = (ImageButton) findViewById(R.id.imageButton1);

        imageButton.setOnClickListener(new OnClickListener() {

            @Override
            public void onClick(View arg0) {

                Toast.makeText(MainActivity.this,
                        "ImageButton is clicked!", Toast.LENGTH_SHORT).show();

            }

        });

    }*/


    public void onClick(final View v){
        switch(v.getId()){
            case R.id.button_festas:
                Intent Festas_page = new Intent(this, FestasActivity.class);
                startActivity(Festas_page);
                break;
            case R.id.imageFestas:
                Intent Festas_pagee = new Intent(this, FestasActivity.class);
                startActivity(Festas_pagee);
                break;
            case R.id.button_aulas:
                Intent Aulas_page = new Intent(this, AulasActivity.class);
                startActivity(Aulas_page);
                break;
            case R.id.imageAulas:
                Intent Aulas_pagee = new Intent(this, AulasActivity.class);
                startActivity(Aulas_pagee);
                break;
            case R.id.button_festivais:
                Intent Festivais_page = new Intent(this, FestivaisActivity.class);
                startActivity(Festivais_page);
                break;
            case R.id.imageFestivais:
                Intent Festivais_pagee = new Intent(this, FestivaisActivity.class);
                startActivity(Festivais_pagee);
                break;
            case R.id.Site:
                goToUrl ( "http://web.tecnico.ulisboa.pt/ist175573");
                break;
        }
    }

    private void goToUrl (String url) {
        Uri uriUrl = Uri.parse(url);
        Intent launchBrowser = new Intent(Intent.ACTION_VIEW, uriUrl);
        startActivity(launchBrowser);
    }
}
