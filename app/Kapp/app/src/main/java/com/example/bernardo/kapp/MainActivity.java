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
                Toast.makeText(MainActivity.this,
                        "FestasButton is clicked!", Toast.LENGTH_SHORT).show();
                break;
            case R.id.imageFestas:
                Toast.makeText(MainActivity.this,
                        "FestasButton is clicked!", Toast.LENGTH_SHORT).show();
                break;
            case R.id.button_aulas:
                Toast.makeText(MainActivity.this,
                        "AulasButton is clicked!", Toast.LENGTH_SHORT).show();
                break;
            case R.id.imageAulas:
                Toast.makeText(MainActivity.this,
                        "AulasButton is clicked!", Toast.LENGTH_SHORT).show();
                break;
            case R.id.button_festivais:
                Toast.makeText(MainActivity.this,
                        "FestivaisButton is clicked!", Toast.LENGTH_SHORT).show();
                break;
            case R.id.imageFestivais:
                Toast.makeText(MainActivity.this,
                        "FestivaisButton is clicked!", Toast.LENGTH_SHORT).show();
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
