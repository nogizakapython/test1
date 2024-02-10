import pandas as pd
import folium

StopTable=pd.read_csv("バス停.csv",encoding="shift_jis")
RouteTable=pd.read_csv("路線.csv",encoding="shift_jis")

stops = StopTable[["バス停番号","バス停名称","緯度","経度","判定"]].values
routes= RouteTable[["路線番号","バス停番号"]].values

m = folium.Map(location=[35.65802,139.75156], zoom_start=16)
for data in stops:
    if data[4]==True:
        folium.Marker([data[2], data[3]], tooltip=data[1]).add_to(m)

df1=pd.merge(RouteTable,StopTable,on="バス停番号",how="left")

colors=["deepskyblue","greenyellow","orange","darkviolet","gold","hotpink","red","blue"]

for route in range(8):
    df2=df1[df1["路線番号"]==route+1]
    df3=df2[["緯度","経度"]].values
    folium.PolyLine(df3,color=colors[route]).add_to(m)

m.save("minato.html")
