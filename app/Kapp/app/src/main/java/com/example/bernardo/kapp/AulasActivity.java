package com.example.bernardo.kapp;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class AulasActivity extends AppCompatActivity {
    //JSONObject jsonobject;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_aulas);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

       /* jsonobject = JSONfunctions.getJSONfromURL("http://web.tecnico.ulisboa.pt/ist175573/send_aulas.php");

        JSONArray jarray= jsonobject.names();

        for(int i=0;i<jarray.length();i++){

            try{
                Log.e("parenttag", jarray.getString(i));
            }catch(JSONException e) {
                    throw new RuntimeException(e);
            }

        }*/
        WebView myWebViewaulas = (WebView) findViewById(R.id.webviewaulas);
        myWebViewaulas.loadUrl("http://web.tecnico.ulisboa.pt/ist175573/aulas_app.php");

        myWebViewaulas.setWebViewClient(new WebViewClient() {
           public boolean shouldOverrideUrlLoading(WebView view, String url) {
               // do your handling codes here, which url is the requested url
               // probably you need to open that url rather than redirect:
               view.loadUrl(url);
               return false; // then it is not handled by default action
           }
       });
    }
}


