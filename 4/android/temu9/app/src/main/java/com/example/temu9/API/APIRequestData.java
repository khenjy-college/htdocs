package com.example.temu9.API;

import com.example.temu9.Model.ResponseModel;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.Call;

public interface APIRequestData {
    @GET("retrieve.php")
    Call<ResponseModel> ardRetrieveData();

}
