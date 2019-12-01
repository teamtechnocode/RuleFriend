package com.androsoft.rulefriend;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Bitmap;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Handler;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import java.util.Objects;

public class MainActivity extends AppCompatActivity {

    SwipeRefreshLayout swipeRefreshLayout;
    WebView webView;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        swipeRefreshLayout = findViewById(R.id.swipe);
        webView = findViewById(R.id.web);

        boolean connected;
        ConnectivityManager connectivityManager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        //we are connected to a network
        connected = Objects.requireNonNull(Objects.requireNonNull(connectivityManager).
                getNetworkInfo(ConnectivityManager.TYPE_MOBILE)).getState() == NetworkInfo.State.CONNECTED ||
                Objects.requireNonNull(connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI)).
                        getState() == NetworkInfo.State.CONNECTED;

        if(!connected)
        {
            final AlertDialog.Builder alert = new AlertDialog.Builder(this);
            String msg1 = "Connection Error!!";
            alert.setTitle(msg1);
            alert.setMessage("Oops!! No Internet Connection Found...");


            alert.setNeutralButton("OK", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialogInterface, int i) {
                    finish();
                }
            });

            final AlertDialog alert1 = alert.create();
            alert1.show();
        }

        if (connected) {
            final ProgressDialog pd = ProgressDialog.show(this, "", "Loading...", true);
            WebSettings webSettings = webView.getSettings();
            webSettings.setJavaScriptEnabled(true);
            webView.getSettings().setLoadWithOverviewMode(true);
            webView.getSettings().setUseWideViewPort(true);
            webView.getSettings().setBuiltInZoomControls(true);
            webView.getSettings().setDisplayZoomControls(false);
            webSettings.setSupportZoom(false);

            webView.setWebViewClient(new WebViewClient() {
                public void onReceivedError(WebView view, int errorCode, String description, String failingUrl) {
                    Toast.makeText(getApplicationContext(), description, Toast.LENGTH_SHORT).show();
                }

                @Override
                public void onPageStarted(WebView view, String url, Bitmap favicon) {
                    pd.show();
                }


                @Override
                public void onPageFinished(WebView view, String url) {
                    pd.dismiss();

                }


            });

            webView.loadUrl("http://rulefriend.tk/login/");

            swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
                @Override
                public void onRefresh() {
                    new Handler().postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            swipeRefreshLayout.setRefreshing(false);
                            webView.reload();
                        }
                    }, 3000);
                }
            });

        }
    }

    @Override
    public void onBackPressed() {
        if(webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }
}

